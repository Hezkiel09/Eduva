<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BootcampSeeder extends Seeder
{
    public function run(): void
    {
        $tracks = DB::table('career_tracks')->pluck('track_id', 'slug');

        $bootcamps = [
            // Frontend
            ['track_id' => $tracks['frontend'], 'name' => 'Dicoding — Belajar Dasar Pemrograman Web', 'url' => 'https://www.dicoding.com/academies/161', 'description' => 'Kursus gratis HTML, CSS, dan dasar web dari Dicoding.'],
            ['track_id' => $tracks['frontend'], 'name' => 'Sanbercode — Frontend Bootcamp', 'url' => 'https://sanbercode.com/bootcamp/frontend-developer', 'description' => 'Bootcamp intensif React.js dan ekosistem frontend modern.'],
            ['track_id' => $tracks['frontend'], 'name' => 'Buildwithangga — Frontend Developer', 'url' => 'https://buildwithangga.com', 'description' => 'Kelas UI ke code dengan studi kasus project nyata.'],

            // Backend
            ['track_id' => $tracks['backend'], 'name' => 'Dicoding — Belajar Backend dengan Node.js', 'url' => 'https://www.dicoding.com/academies/271', 'description' => 'Belajar REST API dan backend fundamentals dengan Node.js.'],
            ['track_id' => $tracks['backend'], 'name' => 'Sanbercode — Backend Laravel Bootcamp', 'url' => 'https://sanbercode.com/bootcamp/laravel', 'description' => 'Bootcamp intensif Laravel dari dasar hingga deploy.'],
            ['track_id' => $tracks['backend'], 'name' => 'Hacktiv8 — Full Stack JavaScript', 'url' => 'https://hacktiv8.com/full-time/fullstack-javascript', 'description' => 'Program intensif fullstack dengan fokus backend Node.js.'],

            // UI/UX
            ['track_id' => $tracks['uiux'], 'name' => 'Dicoding — Belajar Dasar UX Design', 'url' => 'https://www.dicoding.com/academies/535', 'description' => 'Pengenalan UX Design dan Design Thinking dari Dicoding.'],
            ['track_id' => $tracks['uiux'], 'name' => 'Buildwithangga — UI/UX Designer', 'url' => 'https://buildwithangga.com/karir/ui-ux-designer', 'description' => 'Belajar Figma dan desain UI dari nol hingga portfolio.'],
            ['track_id' => $tracks['uiux'], 'name' => 'Skilvul — UI/UX Design Bootcamp', 'url' => 'https://skilvul.com', 'description' => 'Bootcamp UI/UX dengan mentor industri dan project nyata.'],

            // Data Science
            ['track_id' => $tracks['data'], 'name' => 'Dicoding — Machine Learning Developer', 'url' => 'https://www.dicoding.com/learningpaths/30', 'description' => 'Learning path data dan ML dari Dicoding bersama Google.'],
            ['track_id' => $tracks['data'], 'name' => 'RevoU — Data Analytics', 'url' => 'https://revou.co/programme/data-analytics', 'description' => 'Bootcamp data analytics dengan jaminan kerja dari RevoU.'],
            ['track_id' => $tracks['data'], 'name' => 'Hacktiv8 — Data Science Bootcamp', 'url' => 'https://hacktiv8.com/full-time/data-science', 'description' => 'Program intensif data science dengan Python dan ML.'],

            // AI Engineer
            ['track_id' => $tracks['ai'], 'name' => 'Dicoding — TensorFlow Developer', 'url' => 'https://www.dicoding.com/learningpaths/30', 'description' => 'Belajar deep learning dan TensorFlow bersertifikat Google.'],
            ['track_id' => $tracks['ai'], 'name' => 'Korbit AI — Machine Learning', 'url' => 'https://www.korbit.ai', 'description' => 'Platform belajar AI interaktif dengan feedback otomatis.'],
            ['track_id' => $tracks['ai'], 'name' => 'RevoU — AI & Machine Learning', 'url' => 'https://revou.co', 'description' => 'Bootcamp AI Engineer dengan kurikulum industri terkini.'],

            // Cyber Security
            ['track_id' => $tracks['cyber'], 'name' => 'Dicoding — Belajar Keamanan Jaringan', 'url' => 'https://www.dicoding.com/academies/443', 'description' => 'Dasar keamanan jaringan dan sistem dari Dicoding.'],
            ['track_id' => $tracks['cyber'], 'name' => 'Cybrary — Cyber Security Fundamentals', 'url' => 'https://www.cybrary.it', 'description' => 'Platform belajar cyber security dengan lab praktikal.'],
            ['track_id' => $tracks['cyber'], 'name' => 'Hacktiv8 — Cyber Security Bootcamp', 'url' => 'https://hacktiv8.com', 'description' => 'Bootcamp intensif ethical hacking dan keamanan sistem.'],
        ];

        DB::table('bootcamps')->insert($bootcamps);
    }
}