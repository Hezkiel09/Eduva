<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,      // default admin account
            CareerTrackSeeder::class,    // 6 career tracks
            BootcampSeeder::class,       // learning recommendations per track
            AssessmentSeeder::class,     // 1 assessment (RPL)
            QuestionSeeder::class,       // soal + options statis
            IndustryTrendSeeder::class,  // tren industri IT
        ]);
    }
}