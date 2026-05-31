<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssessmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('assessments')->insert([
            'title' => 'Asessem Minat Karier Siswa SMK RPL',
            'description' => 'Quiz pertanyaan untuk mengukur minat dan kesiapanmu memasuki dunia industri teknologi setelah lulus SMK RPL.',
            'major' => 'RPL',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
