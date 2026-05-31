<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,      
            CareerTrackSeeder::class,    
            BootcampSeeder::class,       
            AssessmentSeeder::class,     
            QuestionSeeder::class,      
            IndustryTrendSeeder::class,  
        ]);
    }
}