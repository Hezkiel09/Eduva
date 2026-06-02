<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\IndustryTrend;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user()->load('assessmentResults.careerTrack');
        
        $assessmentHistory = $user->assessmentResults()
            ->with('careerTrack')
            ->orderBy('submitted_at', 'desc')
            ->get();
            
        $totalAssessments = $assessmentHistory->count();
        $latestResult = $assessmentHistory->first();

        $competencies = [
            'frontend' => 0,
            'uiux' => 0,
            'backend' => 0,
            'problem_solving' => 0,
            'git' => 0
        ];
        
        $compScore = 0;
        $topMatches = [];

        $categoryMap = [
            'frontend' => 'Frontend',
            'backend' => 'Backend',
            'uiux' => 'UI/UX',
            'data' => 'Data',
            'ai' => 'AI',
            'cyber' => 'Cyber'
        ];
        if ($totalAssessments > 0) {
            $sumCompetencies = [
                'frontend' => 0,
                'uiux' => 0,
                'backend' => 0,
                'problem_solving' => 0,
                'git' => 0
            ];

            foreach ($assessmentHistory as $result) {
                $scores = $result->track_scores;
                $maxScoreVal = max($scores) ?: 1;

                $frontendScore = round((($scores['frontend'] ?? 0) / $maxScoreVal) * 100);
                $uiuxScore = round((($scores['uiux'] ?? 0) / $maxScoreVal) * 100);
                $backendScore = round((($scores['backend'] ?? 0) / $maxScoreVal) * 100);
                
                $aiDataAvg = ((($scores['ai'] ?? 0) + ($scores['data'] ?? 0)) / 2);
                $problemSolvingScore = round(($aiDataAvg / $maxScoreVal) * 100);
                
                $gitScore = round((($scores['cyber'] ?? 0) / $maxScoreVal) * 100);

                if ($frontendScore < 30) $frontendScore += 40;
                if ($uiuxScore < 30) $uiuxScore += 40;
                if ($backendScore < 30) $backendScore += 40;
                if ($problemSolvingScore < 30) $problemSolvingScore += 40;
                if ($gitScore < 30) $gitScore += 40;

                $sumCompetencies['frontend'] += min(100, $frontendScore);
                $sumCompetencies['uiux'] += min(100, $uiuxScore);
                $sumCompetencies['backend'] += min(100, $backendScore);
                $sumCompetencies['problem_solving'] += min(100, $problemSolvingScore);
                $sumCompetencies['git'] += min(100, $gitScore);
            }

            $competencies = [
                'frontend' => round($sumCompetencies['frontend'] / $totalAssessments),
                'uiux' => round($sumCompetencies['uiux'] / $totalAssessments),
                'backend' => round($sumCompetencies['backend'] / $totalAssessments),
                'problem_solving' => round($sumCompetencies['problem_solving'] / $totalAssessments),
                'git' => round($sumCompetencies['git'] / $totalAssessments)
            ];

            $compScore = round(array_sum($competencies) / count($competencies));

            $latestScores = $latestResult->track_scores;
            arsort($latestScores);
            
            $trackNameMap = [
                'frontend' => [
                    'title' => 'Frontend Developer',
                    'image' => 'img/learningpath/fe.png',
                    'skills' => ['React.js', 'CSS Architecture', 'Web Performance'],
                    'desc' => 'Sangat cocok dengan skor frontend Anda serta kemampuan implementasi visual dan UI/UX.'
                ],
                'backend' => [
                    'title' => 'Backend Developer',
                    'image' => 'img/learningpath/be.png',
                    'skills' => ['Laravel', 'REST API', 'Database Systems'],
                    'desc' => 'Memiliki keselarasan tinggi dengan logika arsitektur sistem dan operasi database backend.'
                ],
                'uiux' => [
                    'title' => 'UX Engineer / Designer',
                    'image' => 'img/learningpath/uiux.png',
                    'skills' => ['Prototyping', 'Interaction Design', 'Design Systems'],
                    'desc' => 'Terdapat irisan kuat antara kemampuan teknis frontend dan minat riset pengguna Anda.'
                ],
                'data' => [
                    'title' => 'Data Analyst',
                    'image' => 'img/learningpath/datascience.png',
                    'skills' => ['Python', 'SQL', 'Data Visualization'],
                    'desc' => 'Sangat sesuai dengan pola pikir analitis dan kemampuan pemrosesan data Anda.'
                ],
                'ai' => [
                    'title' => 'AI Engineer',
                    'image' => 'img/learningpath/datascience.png',
                    'skills' => ['TensorFlow', 'Python', 'Machine Learning'],
                    'desc' => 'Cocok untuk membangun model prediktif cerdas dan sistem kecerdasan buatan.'
                ],
                'cyber' => [
                    'title' => 'Cyber Security Analyst',
                    'image' => 'img/learningpath/cybersecurity.png',
                    'skills' => ['Network Security', 'Risk Analysis', 'Incident Response'],
                    'desc' => 'Sangat diminati untuk menguji keamanan kode dan arsitektur server.'
                ]
            ];

            $count = 0;
            $maxScoreVal = max($latestScores) ?: 1;
            foreach ($latestScores as $trackSlug => $trackScore) {
                if ($count >= 3) break;
                if (isset($trackNameMap[$trackSlug])) {
                    $details = $trackNameMap[$trackSlug];
                    $matchPercent = round(($trackScore / $maxScoreVal) * 100);
                    if ($matchPercent < 50) $matchPercent += 30;
                    $matchPercent = min(98, $matchPercent);

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
            $headlineLower = strtolower($user->headline ?? '');
            if (str_contains($headlineLower, 'data') || str_contains($headlineLower, 'sains')) {
                $topMatches = [
                    [
                        'title' => 'Data Analyst',
                        'percentage' => 92,
                        'image' => 'img/learningpath/datascience.png',
                        'skills' => ['Python', 'SQL', 'Data Visualization'],
                        'desc' => 'Sesuai dengan minat Anda di Sains Data, Anda sangat cocok untuk karir ini.'
                    ],
                    [
                        'title' => 'AI Engineer',
                        'percentage' => 85,
                        'image' => 'img/learningpath/datascience.png',
                        'skills' => ['TensorFlow', 'Python', 'Machine Learning'],
                        'desc' => 'AI Engineering menjadi langkah karir berikutnya yang relevan dengan sains data.'
                    ],
                    [
                        'title' => 'Backend Developer',
                        'percentage' => 70,
                        'image' => 'img/learningpath/be.png',
                        'skills' => ['Laravel', 'REST API', 'Database Systems'],
                        'desc' => 'Penguasaan database pendukung analisis data akan memperkuat karir backend Anda.'
                    ]
                ];
            } elseif (str_contains($headlineLower, 'cyber') || str_contains($headlineLower, 'siber') || str_contains($headlineLower, 'keamanan')) {
                $topMatches = [
                    [
                        'title' => 'Cyber Security Analyst',
                        'percentage' => 98,
                        'image' => 'img/learningpath/cybersecurity.png',
                        'skills' => ['Network Security', 'Risk Analysis', 'Incident Response'],
                        'desc' => 'Pilihan utama berdasarkan minat Anda dalam keamanan siber dan perlindungan data.'
                    ],
                    [
                        'title' => 'Backend Developer',
                        'percentage' => 80,
                        'image' => 'img/learningpath/be.png',
                        'skills' => ['Laravel', 'Secure Coding', 'Linux Admin'],
                        'desc' => 'Kemampuan pengkodean yang aman sangat penting bagi seorang spesialis backend siber.'
                    ],
                    [
                        'title' => 'Data Analyst',
                        'percentage' => 65,
                        'image' => 'img/learningpath/datascience.png',
                        'skills' => ['SQL', 'Security Audits', 'Data Visualization'],
                        'desc' => 'Berguna untuk menganalisis log keamanan dan visualisasi ancaman jaringan.'
                    ]
                ];
            } elseif (str_contains($headlineLower, 'desain') || str_contains($headlineLower, 'ui') || str_contains($headlineLower, 'ux') || str_contains($headlineLower, 'produk')) {
                $topMatches = [
                    [
                        'title' => 'UX Engineer / Designer',
                        'percentage' => 95,
                        'image' => 'img/learningpath/uiux.png',
                        'skills' => ['Prototyping', 'Interaction Design', 'Design Systems'],
                        'desc' => 'Pilihan ideal berdasarkan minat visual Anda dalam merancang sistem desain yang berpusat pada pengguna.'
                    ],
                    [
                        'title' => 'Frontend Developer',
                        'percentage' => 88,
                        'image' => 'img/learningpath/fe.png',
                        'skills' => ['React.js', 'CSS Architecture', 'Web Performance'],
                        'desc' => 'Menerjemahkan rancangan desain yang menawan menjadi antarmuka responsif.'
                    ],
                    [
                        'title' => 'Data Analyst',
                        'percentage' => 60,
                        'image' => 'img/learningpath/datascience.png',
                        'skills' => ['User Analytics', 'SQL', 'A/B Testing'],
                        'desc' => 'Penting untuk menganalisis metrik retensi dan pola kegunaan aplikasi.'
                    ]
                ];
            } else {
                $topMatches = [
                    [
                        'title' => 'Frontend Developer',
                        'percentage' => 94,
                        'image' => 'img/learningpath/fe.png',
                        'skills' => ['React.js', 'CSS Architecture', 'Web Performance'],
                        'desc' => 'Cocok untuk Anda yang menyukai visualisasi web interaktif dan arsitektur CSS.'
                    ],
                    [
                        'title' => 'UX Engineer',
                        'percentage' => 89,
                        'image' => 'img/learningpath/uiux.png',
                        'skills' => ['Prototyping', 'Interaction Design', 'Design Systems'],
                        'desc' => 'Cocok dengan perpaduan keahlian frontend dan estetika visual pengguna.'
                    ],
                    [
                        'title' => 'Backend Developer',
                        'percentage' => 75,
                        'image' => 'img/learningpath/be.png',
                        'skills' => ['Laravel', 'REST API', 'Database Systems'],
                        'desc' => 'Sesuai untuk mengembangkan logika server dan manajemen database relasional.'
                    ]
                ];
            }
        }

        $primaryCategory = 'Frontend';
        if ($latestResult) {
            $primaryCategory = $categoryMap[$latestResult->top_track] ?? 'Frontend';
        } elseif ($user->headline) {
            $headlineLower = strtolower($user->headline);
            if (str_contains($headlineLower, 'data') || str_contains($headlineLower, 'sains')) {
                $primaryCategory = 'Data';
            } elseif (str_contains($headlineLower, 'ai') || str_contains($headlineLower, 'kecerdasan') || str_contains($headlineLower, 'artificial')) {
                $primaryCategory = 'AI';
            } elseif (str_contains($headlineLower, 'cyber') || str_contains($headlineLower, 'siber') || str_contains($headlineLower, 'keamanan')) {
                $primaryCategory = 'Cyber';
            } elseif (str_contains($headlineLower, 'desain') || str_contains($headlineLower, 'ui') || str_contains($headlineLower, 'ux')) {
                $primaryCategory = 'UI/UX';
            } elseif (str_contains($headlineLower, 'backend') || str_contains($headlineLower, 'sistem')) {
                $primaryCategory = 'Backend';
            }
        }

        $trends = IndustryTrend::where('category', $primaryCategory)->get();
        if ($trends->isEmpty()) {
            $interestTags = [$primaryCategory . ' Dev', 'Fullstack Engineering', 'UI/UX Research', 'Product Design', 'Data Analytics'];
            $insightTrend = (object) [
                'skill_name' => 'Figma & Design Systems',
                'demand_level' => 'high',
                'description' => 'Kemampuan merancang antarmuka pengguna yang konsisten dan kolaboratif kini menjadi standar utama industri digital.'
            ];
        } else {
            $interestTags = $trends->pluck('skill_name')->toArray();
            $insightTrend = $trends->where('demand_level', 'high')->first() ?? $trends->first();
        }

        $recommendedSteps = [
            [
                'id' => 'step-assessment',
                'text' => 'Ikuti asesmen perdana untuk petakan skill',
                'done' => $totalAssessments > 0,
                'action_url' => route('assessment.index'),
                'auto' => true
            ],
            [
                'id' => 'step-avatar',
                'text' => 'Unggah foto profil personal Anda',
                'done' => !empty($user->avatar),
                'action_url' => route('profile.edit'),
                'auto' => true
            ],
            [
                'id' => 'step-profile-data',
                'text' => 'Lengkapi Headline & Biografi Singkat',
                'done' => !empty($user->bio) && !empty($user->headline),
                'action_url' => route('profile.edit'),
                'auto' => true
            ],
            [
                'id' => 'step-lp',
                'text' => 'Buka modul rekomendasi Learning Path',
                'done' => false,
                'action_url' => route('learning-path'),
                'auto' => false
            ],
        ];

        return view('profile.show', compact(
            'user', 
            'competencies', 
            'topMatches', 
            'totalAssessments', 
            'compScore', 
            'assessmentHistory',
            'interestTags',
            'insightTrend',
            'recommendedSteps'
        ));
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
            
            $avatar->storeAs('avatars', $filename, 'public');
            
            if ($user->avatar) {
                Storage::disk('public')->delete('avatars/' . $user->avatar);
            }
            
            $updateData['avatar'] = $filename;
        }

        $user->update($updateData);

        return redirect()->route('profile.show')->with('success', 'Profil Anda berhasil diperbarui.');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }
}
