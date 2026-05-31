<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $assessmentId = DB::table('assessments')->first()->assessment_id;

        $questions = [
            [
                'text' => 'Ketika punya waktu luang, kamu lebih suka ngapain?',
                'options' => [
                    ['text' => 'Bikin desain poster atau tampilan aplikasi yang keren',     'scores' => ['frontend'=>2,'backend'=>0,'uiux'=>3,'data'=>0,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Ngulik cara kerja sistem atau jaringan komputer',            'scores' => ['frontend'=>0,'backend'=>2,'uiux'=>0,'data'=>0,'ai'=>1,'cyber'=>3]],
                    ['text' => 'Analisis data atau bikin grafik dari sekumpulan informasi',  'scores' => ['frontend'=>0,'backend'=>1,'uiux'=>0,'data'=>3,'ai'=>2,'cyber'=>0]],
                    ['text' => 'Ngoding fitur baru atau eksperimen dengan framework',        'scores' => ['frontend'=>1,'backend'=>3,'uiux'=>0,'data'=>1,'ai'=>1,'cyber'=>0]],
                ]
            ],
            [
                'text' => 'Dari pilihan berikut, tugas mana yang paling kamu nikmati?',
                'options' => [
                    ['text' => 'Memastikan tombol, warna, dan layout website rapi dan enak dilihat', 'scores' => ['frontend'=>3,'backend'=>0,'uiux'=>2,'data'=>0,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Menulis query SQL untuk mengolah ribuan data',                        'scores' => ['frontend'=>0,'backend'=>2,'uiux'=>0,'data'=>3,'ai'=>1,'cyber'=>0]],
                    ['text' => 'Mencari celah keamanan di sebuah sistem',                            'scores' => ['frontend'=>0,'backend'=>1,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>3]],
                    ['text' => 'Melatih model AI supaya bisa mengenali gambar atau suara',           'scores' => ['frontend'=>0,'backend'=>0,'uiux'=>0,'data'=>2,'ai'=>3,'cyber'=>0]],
                ]
            ],
            [
                'text' => 'Saat kerja kelompok, kamu paling sering jadi?',
                'options' => [
                    ['text' => 'Yang bikin slide/presentasi supaya kelihatan profesional',  'scores' => ['frontend'=>1,'backend'=>0,'uiux'=>3,'data'=>0,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Yang ngoding logika atau fitur utama sistemnya',            'scores' => ['frontend'=>1,'backend'=>3,'uiux'=>0,'data'=>1,'ai'=>1,'cyber'=>0]],
                    ['text' => 'Yang ngumpulin dan analisis data untuk keputusan tim',      'scores' => ['frontend'=>0,'backend'=>0,'uiux'=>1,'data'=>3,'ai'=>2,'cyber'=>0]],
                    ['text' => 'Yang mastiin sistem aman dan tidak ada bug kritis',         'scores' => ['frontend'=>0,'backend'=>1,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>3]],
                ]
            ],
            [
                'text' => 'Kamu lagi belajar sendiri. Konten apa yang paling sering kamu tonton/baca?',
                'options' => [
                    ['text' => 'Tutorial bikin UI/animasi CSS yang smooth',         'scores' => ['frontend'=>3,'backend'=>0,'uiux'=>2,'data'=>0,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Video tentang machine learning atau neural network', 'scores' => ['frontend'=>0,'backend'=>0,'uiux'=>0,'data'=>2,'ai'=>3,'cyber'=>0]],
                    ['text' => 'Tutorial REST API dan cara kerja server',           'scores' => ['frontend'=>0,'backend'=>3,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>1]],
                    ['text' => 'Video ethical hacking atau CTF writeup',            'scores' => ['frontend'=>0,'backend'=>1,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>3]],
                ]
            ],
            [
                'text' => 'Kalau kamu diminta bikin aplikasi dari nol, bagian mana yang paling excited kamu kerjain?',
                'options' => [
                    ['text' => 'Desain tampilan — warna, font, layout, animasi',   'scores' => ['frontend'=>2,'backend'=>0,'uiux'=>3,'data'=>0,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Database dan API — struktur data dan logika server','scores' => ['frontend'=>0,'backend'=>3,'uiux'=>0,'data'=>1,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Fitur AI — rekomendasi, prediksi, atau chatbot',   'scores' => ['frontend'=>0,'backend'=>1,'uiux'=>0,'data'=>2,'ai'=>3,'cyber'=>0]],
                    ['text' => 'Security — autentikasi, enkripsi, proteksi data',  'scores' => ['frontend'=>0,'backend'=>1,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>3]],
                ]
            ],

            [
                'text' => 'Ketika nemuin bug di kode, reaksi pertama kamu?',
                'options' => [
                    ['text' => 'Langsung trace log server dan cek database',                'scores' => ['frontend'=>0,'backend'=>3,'uiux'=>0,'data'=>1,'ai'=>0,'cyber'=>1]],
                    ['text' => 'Inspect element dan cek tampilan di berbagai device',       'scores' => ['frontend'=>3,'backend'=>0,'uiux'=>1,'data'=>0,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Cek apakah ada pola aneh dari data yang masuk',            'scores' => ['frontend'=>0,'backend'=>1,'uiux'=>0,'data'=>3,'ai'=>2,'cyber'=>0]],
                    ['text' => 'Curiga ada vulnerability dan cek celah keamanannya',       'scores' => ['frontend'=>0,'backend'=>0,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>3]],
                ]
            ],
            [
                'text' => 'Kamu lebih suka bekerja dengan?',
                'options' => [
                    ['text' => 'Angka, statistik, dan pola dalam data',         'scores' => ['frontend'=>0,'backend'=>1,'uiux'=>0,'data'=>3,'ai'=>3,'cyber'=>0]],
                    ['text' => 'Warna, bentuk, dan estetika visual',            'scores' => ['frontend'=>2,'backend'=>0,'uiux'=>3,'data'=>0,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Logika, algoritma, dan arsitektur sistem',      'scores' => ['frontend'=>0,'backend'=>3,'uiux'=>0,'data'=>1,'ai'=>2,'cyber'=>1]],
                    ['text' => 'Protokol jaringan dan mekanisme keamanan',      'scores' => ['frontend'=>0,'backend'=>1,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>3]],
                ]
            ],
            [
                'text' => 'Menurutmu, hal terpenting dalam sebuah aplikasi adalah?',
                'options' => [
                    ['text' => 'Tampilannya menarik dan mudah dipakai user',    'scores' => ['frontend'=>2,'backend'=>0,'uiux'=>3,'data'=>0,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Performa dan skalabilitas sistemnya',           'scores' => ['frontend'=>0,'backend'=>3,'uiux'=>0,'data'=>1,'ai'=>1,'cyber'=>1]],
                    ['text' => 'Keamanan data pengguna terjamin',               'scores' => ['frontend'=>0,'backend'=>1,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>3]],
                    ['text' => 'Fitur cerdas yang bisa belajar dari data',      'scores' => ['frontend'=>0,'backend'=>0,'uiux'=>0,'data'=>2,'ai'=>3,'cyber'=>0]],
                ]
            ],
            [
                'text' => 'Kamu lebih suka problem solving yang seperti apa?',
                'options' => [
                    ['text' => 'Gimana caranya tampilan ini lebih intuitif untuk user',     'scores' => ['frontend'=>1,'backend'=>0,'uiux'=>3,'data'=>0,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Gimana caranya query ini lebih cepat dan efisien',          'scores' => ['frontend'=>0,'backend'=>3,'uiux'=>0,'data'=>2,'ai'=>1,'cyber'=>0]],
                    ['text' => 'Gimana caranya model ini bisa lebih akurat prediksinya',   'scores' => ['frontend'=>0,'backend'=>0,'uiux'=>0,'data'=>2,'ai'=>3,'cyber'=>0]],
                    ['text' => 'Gimana caranya sistem ini tidak bisa ditembus attacker',   'scores' => ['frontend'=>0,'backend'=>1,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>3]],
                ]
            ],

            [
                'text' => 'Tool atau software mana yang paling ingin kamu kuasai?',
                'options' => [
                    ['text' => 'Figma atau Adobe XD untuk desain',          'scores' => ['frontend'=>1,'backend'=>0,'uiux'=>3,'data'=>0,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Kali Linux atau Wireshark untuk security',  'scores' => ['frontend'=>0,'backend'=>0,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>3]],
                    ['text' => 'TensorFlow atau PyTorch untuk AI',          'scores' => ['frontend'=>0,'backend'=>0,'uiux'=>0,'data'=>1,'ai'=>3,'cyber'=>0]],
                    ['text' => 'Laravel, Express, atau Django untuk backend','scores' => ['frontend'=>0,'backend'=>3,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>0]],
                ]
            ],
            [
                'text' => 'Bahasa pemrograman mana yang paling menarik untukmu?',
                'options' => [
                    ['text' => 'JavaScript / TypeScript',   'scores' => ['frontend'=>3,'backend'=>1,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Python',                    'scores' => ['frontend'=>0,'backend'=>1,'uiux'=>0,'data'=>3,'ai'=>3,'cyber'=>1]],
                    ['text' => 'PHP / Java / Go',           'scores' => ['frontend'=>0,'backend'=>3,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>1]],
                    ['text' => 'Bash / C / Assembly',       'scores' => ['frontend'=>0,'backend'=>1,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>3]],
                ]
            ],
            [
                'text' => 'Kamu lagi ikut hackathon. Kamu paling mau ambil role apa?',
                'options' => [
                    ['text' => 'UI/UX Designer — bikin prototype yang kelihatan keren',    'scores' => ['frontend'=>1,'backend'=>0,'uiux'=>3,'data'=>0,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Frontend Dev — implementasi tampilan dari desain',          'scores' => ['frontend'=>3,'backend'=>0,'uiux'=>1,'data'=>0,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Backend Dev — bikin API dan database',                     'scores' => ['frontend'=>0,'backend'=>3,'uiux'=>0,'data'=>1,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Data/AI Dev — integrasi model machine learning',           'scores' => ['frontend'=>0,'backend'=>0,'uiux'=>0,'data'=>2,'ai'=>3,'cyber'=>0]],
                ]
            ],

            [
                'text' => 'Apa yang paling bikin kamu puas setelah selesai ngerjain sesuatu?',
                'options' => [
                    ['text' => 'Lihat desain/tampilan yang gw buat jadi kelihatan profesional',     'scores' => ['frontend'=>2,'backend'=>0,'uiux'=>3,'data'=>0,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Sistem berjalan cepat, stabil, dan tidak ada error',                'scores' => ['frontend'=>0,'backend'=>3,'uiux'=>0,'data'=>1,'ai'=>1,'cyber'=>1]],
                    ['text' => 'Model AI-nya akurat dan bisa prediksi dengan benar',               'scores' => ['frontend'=>0,'backend'=>0,'uiux'=>0,'data'=>2,'ai'=>3,'cyber'=>0]],
                    ['text' => 'Berhasil nemuin dan nutup celah keamanan sebelum dieksploitasi',   'scores' => ['frontend'=>0,'backend'=>0,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>3]],
                ]
            ],
            [
                'text' => 'Di dunia industri, kamu paling ingin bekerja sebagai?',
                'options' => [
                    ['text' => 'Frontend Engineer di startup teknologi',    'scores' => ['frontend'=>3,'backend'=>0,'uiux'=>1,'data'=>0,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Data Analyst atau Data Engineer',           'scores' => ['frontend'=>0,'backend'=>1,'uiux'=>0,'data'=>3,'ai'=>2,'cyber'=>0]],
                    ['text' => 'Penetration Tester atau Security Analyst',  'scores' => ['frontend'=>0,'backend'=>0,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>3]],
                    ['text' => 'ML Engineer atau AI Researcher',            'scores' => ['frontend'=>0,'backend'=>0,'uiux'=>0,'data'=>2,'ai'=>3,'cyber'=>0]],
                ]
            ],
            [
                'text' => 'Kalau kamu bisa belajar satu hal hari ini, kamu pilih?',
                'options' => [
                    ['text' => 'Cara bikin animasi CSS yang smooth dan interaktif',    'scores' => ['frontend'=>3,'backend'=>0,'uiux'=>2,'data'=>0,'ai'=>0,'cyber'=>0]],
                    ['text' => 'Cara kerja enkripsi dan sistem autentikasi modern',    'scores' => ['frontend'=>0,'backend'=>1,'uiux'=>0,'data'=>0,'ai'=>0,'cyber'=>3]],
                    ['text' => 'Cara kerja neural network dari matematikanya',         'scores' => ['frontend'=>0,'backend'=>0,'uiux'=>0,'data'=>1,'ai'=>3,'cyber'=>0]],
                    ['text' => 'Cara desain database yang efisien dan scalable',       'scores' => ['frontend'=>0,'backend'=>3,'uiux'=>0,'data'=>2,'ai'=>0,'cyber'=>0]],
                ]
            ],
        ];

        foreach ($questions as $index => $q) {
            $questionId = DB::table('questions')->insertGetId([
                'assessment_id' => $assessmentId,
                'question_text' => $q['text'],
                'order_number'  => $index + 1, 
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            foreach ($q['options'] as $opt) {
                DB::table('options')->insert([
                    'question_id' => $questionId,
                    'option_text' => $opt['text'],
                    'scores'      => json_encode($opt['scores']),
                ]);
            }
        }
    }
}