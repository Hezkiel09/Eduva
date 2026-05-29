<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CareerTrackSeeder extends Seeder
{
    public function run(): void
    {
        $tracks = [
            [
                'slug'        => 'frontend',
                'title'       => 'Frontend Developer',
                'description' => 'Membangun tampilan website yang interaktif dan menarik menggunakan HTML, CSS, dan JavaScript.',
                'roadmap'     => json_encode([
                    'phases' => [
                        [
                            'phase' => 1,
                            'duration' => 'Bulan 1-2',
                            'title' => 'Dasar Web',
                            'topics' => ['HTML5 & CSS3', 'Flexbox & Grid', 'JavaScript Dasar']
                        ],
                        [
                            'phase' => 2,
                            'duration' => 'Bulan 3-4',
                            'title' => 'Framework Modern',
                            'topics' => ['React.js / Vue.js', 'Tailwind CSS', 'REST API Integration']
                        ],
                        [
                            'phase' => 3,
                            'duration' => 'Bulan 5-6',
                            'title' => 'Portfolio & Deploy',
                            'topics' => ['Git & GitHub', 'Vercel / Netlify', 'Build Project Portfolio']
                        ],
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug'        => 'backend',
                'title'       => 'Backend Developer',
                'description' => 'Membangun logika server, database, dan API yang menjadi fondasi aplikasi.',
                'roadmap'     => json_encode([
                    'phases' => [
                        [
                            'phase' => 1,
                            'duration' => 'Bulan 1-2',
                            'title' => 'Logika & Dasar Pemrograman',
                            'topics' => ['Algoritma & Struktur Data', 'OOP', 'Git & GitHub']
                        ],
                        [
                            'phase' => 2,
                            'duration' => 'Bulan 3-4',
                            'title' => 'Framework & Database',
                            'topics' => ['Laravel / Express.js', 'MySQL & Eloquent ORM', 'REST API']
                        ],
                        [
                            'phase' => 3,
                            'duration' => 'Bulan 5-6',
                            'title' => 'Deploy & Security',
                            'topics' => ['Docker Basics', 'Deploy ke VPS', 'Autentikasi & JWT']
                        ],
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug'        => 'uiux',
                'title'       => 'UI/UX Designer',
                'description' => 'Merancang pengalaman pengguna yang intuitif dan tampilan yang estetik.',
                'roadmap'     => json_encode([
                    'phases' => [
                        [
                            'phase' => 1,
                            'duration' => 'Bulan 1-2',
                            'title' => 'Dasar Desain',
                            'topics' => ['Design Thinking', 'Prinsip UI (Warna, Tipografi, Layout)', 'Figma Dasar']
                        ],
                        [
                            'phase' => 2,
                            'duration' => 'Bulan 3-4',
                            'title' => 'UX Research & Prototyping',
                            'topics' => ['User Research & Interview', 'Wireframing', 'Prototyping Interaktif']
                        ],
                        [
                            'phase' => 3,
                            'duration' => 'Bulan 5-6',
                            'title' => 'Portfolio & Handoff',
                            'topics' => ['Usability Testing', 'Design System', 'Developer Handoff']
                        ],
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug'        => 'data',
                'title'       => 'Data Scientist',
                'description' => 'Menganalisis data untuk menemukan pola dan insight yang membantu pengambilan keputusan bisnis.',
                'roadmap'     => json_encode([
                    'phases' => [
                        [
                            'phase' => 1,
                            'duration' => 'Bulan 1-2',
                            'title' => 'Dasar Statistik & Python',
                            'topics' => ['Statistik Dasar', 'Python (NumPy, Pandas)', 'Data Cleaning']
                        ],
                        [
                            'phase' => 2,
                            'duration' => 'Bulan 3-4',
                            'title' => 'Analisis & Visualisasi',
                            'topics' => ['Exploratory Data Analysis', 'Matplotlib & Seaborn', 'SQL untuk Data']
                        ],
                        [
                            'phase' => 3,
                            'duration' => 'Bulan 5-6',
                            'title' => 'Machine Learning Dasar',
                            'topics' => ['Scikit-learn', 'Regresi & Klasifikasi', 'Model Evaluation']
                        ],
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug'        => 'ai',
                'title'       => 'AI Engineer',
                'description' => 'Membangun dan mengimplementasikan model kecerdasan buatan untuk memecahkan masalah kompleks.',
                'roadmap'     => json_encode([
                    'phases' => [
                        [
                            'phase' => 1,
                            'duration' => 'Bulan 1-2',
                            'title' => 'Matematika & Python',
                            'topics' => ['Linear Algebra & Kalkulus', 'Python untuk AI', 'NumPy & Pandas']
                        ],
                        [
                            'phase' => 2,
                            'duration' => 'Bulan 3-4',
                            'title' => 'Machine & Deep Learning',
                            'topics' => ['ML Algorithms', 'Neural Network', 'TensorFlow / PyTorch']
                        ],
                        [
                            'phase' => 3,
                            'duration' => 'Bulan 5-6',
                            'title' => 'Implementasi & Deploy',
                            'topics' => ['NLP / Computer Vision', 'Model Deployment', 'MLOps Dasar']
                        ],
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug'        => 'cyber',
                'title'       => 'Cyber Security',
                'description' => 'Melindungi sistem dan jaringan dari ancaman siber serta celah keamanan.',
                'roadmap'     => json_encode([
                    'phases' => [
                        [
                            'phase' => 1,
                            'duration' => 'Bulan 1-2',
                            'title' => 'Dasar Jaringan & OS',
                            'topics' => ['Networking (TCP/IP, DNS)', 'Linux Dasar', 'Kriptografi Dasar']
                        ],
                        [
                            'phase' => 2,
                            'duration' => 'Bulan 3-4',
                            'title' => 'Ethical Hacking',
                            'topics' => ['Penetration Testing', 'OWASP Top 10', 'Tools: Nmap, Burp Suite']
                        ],
                        [
                            'phase' => 3,
                            'duration' => 'Bulan 5-6',
                            'title' => 'Spesialisasi',
                            'topics' => ['SOC & Incident Response', 'CTF Practice', 'Sertifikasi: CompTIA Security+']
                        ],
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($tracks as $track) {
            DB::table('career_tracks')->updateOrInsert(
                ['slug' => $track['slug']],
                $track
            );
        }
    }
}
