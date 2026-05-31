<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustryTrendSeeder extends Seeder
{
    public function run(): void
    {
        $trends = [
            // ── Frontend ──────────────────────────────────────────────
            [
                'skill_name'   => 'React.js',
                'category'     => 'Frontend',
                'demand_level' => 'high',
                'description'  => 'Library JavaScript paling populer untuk membangun antarmuka pengguna yang interaktif dan scalable.',
            ],
            [
                'skill_name'   => 'Next.js',
                'category'     => 'Frontend',
                'demand_level' => 'high',
                'description'  => 'Framework React dengan fitur SSR dan SSG, sangat diminati untuk web modern berkinerja tinggi.',
            ],
            [
                'skill_name'   => 'TypeScript',
                'category'     => 'Frontend',
                'demand_level' => 'high',
                'description'  => 'Superset JavaScript dengan static typing yang kini menjadi standar di banyak perusahaan teknologi.',
            ],
            [
                'skill_name'   => 'Tailwind CSS',
                'category'     => 'Frontend',
                'demand_level' => 'medium',
                'description'  => 'Framework CSS utility-first yang mempercepat pengembangan UI secara signifikan.',
            ],

            // ── Backend ───────────────────────────────────────────────
            [
                'skill_name'   => 'Node.js / Express',
                'category'     => 'Backend',
                'demand_level' => 'high',
                'description'  => 'Runtime JavaScript sisi server yang populer untuk membangun REST API berkinerja tinggi.',
            ],
            [
                'skill_name'   => 'Laravel (PHP)',
                'category'     => 'Backend',
                'demand_level' => 'high',
                'description'  => 'Framework PHP yang banyak digunakan di startup dan enterprise Indonesia.',
            ],
            [
                'skill_name'   => 'Docker & Container',
                'category'     => 'Backend',
                'demand_level' => 'high',
                'description'  => 'Teknologi containerisasi yang kini menjadi syarat dasar di hampir semua lowongan backend developer.',
            ],
            [
                'skill_name'   => 'RESTful API Design',
                'category'     => 'Backend',
                'demand_level' => 'high',
                'description'  => 'Kemampuan merancang dan membangun API yang clean, konsisten, dan mudah dikonsumsi.',
            ],

            // ── Data Science ──────────────────────────────────────────
            [
                'skill_name'   => 'Python (Data)',
                'category'     => 'Data',
                'demand_level' => 'high',
                'description'  => 'Bahasa utama untuk analisis data, machine learning, dan otomasi. Wajib dikuasai oleh data scientist.',
            ],
            [
                'skill_name'   => 'SQL & Database',
                'category'     => 'Data',
                'demand_level' => 'high',
                'description'  => 'Kemampuan query data dari database relasional menjadi skill dasar yang dibutuhkan hampir semua peran di industri.',
            ],
            [
                'skill_name'   => 'Data Visualization',
                'category'     => 'Data',
                'demand_level' => 'medium',
                'description'  => 'Kemampuan menyajikan data dalam bentuk visual yang informatif menggunakan tools seperti Tableau atau Power BI.',
            ],

            // ── AI / Machine Learning ─────────────────────────────────
            [
                'skill_name'   => 'Machine Learning',
                'category'     => 'AI',
                'demand_level' => 'high',
                'description'  => 'Permintaan AI Engineer terus meningkat seiring adopsi AI di berbagai industri.',
            ],
            [
                'skill_name'   => 'Large Language Models (LLM)',
                'category'     => 'AI',
                'demand_level' => 'high',
                'description'  => 'Kemampuan mengintegrasikan dan fine-tuning LLM (GPT, Gemini, dll.) menjadi skill paling diminati di 2024-2025.',
            ],
            [
                'skill_name'   => 'Computer Vision',
                'category'     => 'AI',
                'demand_level' => 'medium',
                'description'  => 'Dibutuhkan di industri manufaktur, keamanan, dan kesehatan untuk pemrosesan gambar otomatis.',
            ],

            // ── Cyber Security ────────────────────────────────────────
            [
                'skill_name'   => 'Penetration Testing',
                'category'     => 'Cyber',
                'demand_level' => 'high',
                'description'  => 'Keahlian ethical hacking untuk menemukan celah keamanan sebelum dieksploitasi pihak jahat.',
            ],
            [
                'skill_name'   => 'Cloud Security (AWS/GCP/Azure)',
                'category'     => 'Cyber',
                'demand_level' => 'high',
                'description'  => 'Dengan migrasi ke cloud yang masif, keamanan infrastruktur cloud menjadi prioritas utama perusahaan.',
            ],
            [
                'skill_name'   => 'SIEM & Incident Response',
                'category'     => 'Cyber',
                'demand_level' => 'medium',
                'description'  => 'Kemampuan memantau, mendeteksi, dan merespon insiden keamanan secara real-time.',
            ],

            // ── UI/UX ─────────────────────────────────────────────────
            [
                'skill_name'   => 'Figma',
                'category'     => 'UI/UX',
                'demand_level' => 'high',
                'description'  => 'Tool desain kolaboratif yang kini menjadi standar industri untuk UI/UX designer.',
            ],
            [
                'skill_name'   => 'UX Research',
                'category'     => 'UI/UX',
                'demand_level' => 'medium',
                'description'  => 'Kemampuan riset pengguna melalui interview, usability testing, dan analisis data perilaku.',
            ],
            [
                'skill_name'   => 'Design System',
                'category'     => 'UI/UX',
                'demand_level' => 'medium',
                'description'  => 'Membuat dan mengelola design system yang konsisten untuk mempercepat kolaborasi antar tim.',
            ],
        ];

        foreach ($trends as $trend) {
            DB::table('industry_trends')->updateOrInsert(
                ['skill_name' => $trend['skill_name']],
                $trend
            );
        }
    }
}
