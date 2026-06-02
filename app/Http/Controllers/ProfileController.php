<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user()->load('assessmentResults.careerTrack');
        
        // Get the latest assessment result
        $latestResult = $user->assessmentResults()->latest('submitted_at')->first();
        
        // Default competencies values matching the UI mockup if no results yet
        $competencies = [
            'frontend' => 95,
            'uiux' => 88,
            'backend' => 75,
            'problem_solving' => 92,
            'git' => 90
        ];

        $topMatches = [];
        $totalAssessments = $user->assessmentResults()->count();
        $compScore = 92; // Default mock score
        
        if ($latestResult) {
            $scores = $latestResult->track_scores; // Array containing frontend, backend, etc.
            
            // Calculate total possible score per category (typically out of 100 for each option if scaled, or direct percentages)
            // Let's compute actual percentages
            $maxScoreVal = max($scores) ?: 1;
            
            $competencies['frontend'] = round((($scores['frontend'] ?? 0) / $maxScoreVal) * 100);
            $competencies['uiux'] = round((($scores['uiux'] ?? 0) / $maxScoreVal) * 100);
            $competencies['backend'] = round((($scores['backend'] ?? 0) / $maxScoreVal) * 100);
            
            // Map AI/Data score to problem solving
            $aiDataAvg = ((($scores['ai'] ?? 0) + ($scores['data'] ?? 0)) / 2);
            $competencies['problem_solving'] = round(($aiDataAvg / $maxScoreVal) * 100);
            
            // Map Cyber score to Version Control / Git or cybersecurity
            $competencies['git'] = round((($scores['cyber'] ?? 0) / $maxScoreVal) * 100);
            
            // Ensure no 0s look empty, provide decent defaults if score is low
            foreach ($competencies as $key => $val) {
                if ($val < 30) {
                    $competencies[$key] = $val + 40; // bump up for nicer display
                }
            }

            // Calculate Comp. Score: highest track percentage
            $compScore = max($competencies);

            // Populate real Career Matches based on their scores
            // Sort scores descending
            arsort($scores);
            
            $trackNameMap = [
                'frontend' => [
                    'title' => 'Frontend Developer',
                    'image' => 'img/learningpath/fe.png',
                    'skills' => ['React.js', 'CSS Architecture', 'Web Performance'],
                    'desc' => 'Perfectly aligned with your current learning path, React proficiency, and UI/UX implementation scores.'
                ],
                'backend' => [
                    'title' => 'Backend Developer',
                    'image' => 'img/learningpath/be.png',
                    'skills' => ['Laravel', 'REST API', 'Database Systems'],
                    'desc' => 'Strong affinity with system architecture, security, and complex backend operations.'
                ],
                'uiux' => [
                    'title' => 'UX Engineer / Designer',
                    'image' => 'img/learningpath/uiux.png',
                    'skills' => ['Prototyping', 'Interaction Design', 'Design Systems'],
                    'desc' => 'Strong overlap between your technical frontend abilities and your interest in user-centric design.'
                ],
                'data' => [
                    'title' => 'Data Analyst',
                    'image' => 'img/learningpath/datascience.png',
                    'skills' => ['Python', 'SQL', 'Data Visualization'],
                    'desc' => 'Highly aligned with your analytical thinking and data processing capability.'
                ],
                'ai' => [
                    'title' => 'AI Engineer',
                    'image' => 'img/learningpath/datascience.png',
                    'skills' => ['TensorFlow', 'Python', 'Machine Learning'],
                    'desc' => 'Suited for building intelligent predictive models and machine learning pipelines.'
                ],
                'cyber' => [
                    'title' => 'Cyber Security Analyst',
                    'image' => 'img/learningpath/cybersecurity.png',
                    'skills' => ['Network Security', 'Risk Analysis', 'Incident Response'],
                    'desc' => 'High demand for your security test scores, analytical skills, and attention to detail in code review.'
                ]
            ];

            $count = 0;
            foreach ($scores as $trackSlug => $trackScore) {
                if ($count >= 3) break;
                if (isset($trackNameMap[$trackSlug])) {
                    $details = $trackNameMap[$trackSlug];
                    
                    // Match percentage calculation
                    $matchPercent = round(($trackScore / $maxScoreVal) * 100);
                    if ($matchPercent < 50) $matchPercent += 30; // bump up for nicer visuals
                    if ($matchPercent > 99) $matchPercent = 98; // match mockup style 

                    $topMatches[] = [
                        'title' => $details['title'],
                        'percentage' => $matchPercent,
                        'image' => $details['image'],
                        'skills' => $details['skills'],
                        'desc' => $details['desc']
                    ];
                    $count++;
                }
            }
        } else {
            // Mock Top Career Matches if they have no assessment records
            $topMatches = [
                [
                    'title' => 'Cyber Security Analyst',
                    'percentage' => 98,
                    'image' => 'img/learningpath/cybersecurity.png',
                    'skills' => ['Network Security', 'Risk Analysis', 'Incident Response'],
                    'desc' => 'High demand for your security test scores, analytical skills, and attention to detail in code review.'
                ],
                [
                    'title' => 'Frontend Developer',
                    'percentage' => 94,
                    'image' => 'img/learningpath/fe.png',
                    'skills' => ['React.js', 'CSS Architecture', 'Web Performance'],
                    'desc' => 'Perfectly aligned with your current learning path, React proficiency, and UI/UX implementation scores.'
                ],
                [
                    'title' => 'UX Engineer',
                    'percentage' => 89,
                    'image' => 'img/learningpath/uiux.png',
                    'skills' => ['Prototyping', 'Interaction Design', 'Design Systems'],
                    'desc' => 'Strong overlap between your technical frontend abilities and your interest in user-centric design.'
                ]
            ];
        }

        return view('profile.show', compact('user', 'competencies', 'topMatches', 'totalAssessments', 'compScore'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => [
                'nullable',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'headline' => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
            'age' => 'nullable|integer|min:1|max:120',
            'bio' => 'nullable|string|max:1000',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'avatar.image' => 'File harus berupa gambar.',
            'avatar.mimes' => 'Format foto profil wajib JPG, JPEG, atau PNG.',
            'avatar.max' => 'Ukuran foto profil tidak boleh melebihi 2MB.',
        ]);

        $updateData = [
            'username' => strtolower($validated['username']),
            'email' => $validated['email'] ?? null,
            'headline' => $validated['headline'] ?? null,
            'institution' => $validated['institution'] ?? null,
            'age' => $validated['age'] ?? null,
            'bio' => $validated['bio'] ?? null,
        ];

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = 'avatar_' . $user->id . '_' . time() . '.' . $avatar->getClientOriginalExtension();
            
            // Store file in public/avatars folder
            $avatar->storeAs('public/avatars', $filename);
            
            // Delete old avatar if it exists
            if ($user->avatar) {
                Storage::delete('public/avatars/' . $user->avatar);
            }
            
            $updateData['avatar'] = $filename;
        }

        $user->update($updateData);

        return back()->with('success', 'Profil Anda berhasil diperbarui.');
    }
}
