<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            // Seed the 'projects' table
            $projectId = DB::table('projects')->insertGetId([
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Seed the 'project_translations' table
            $translations = [
                ['project_id' => $projectId, 'locale' => 'en', 'name' => 'Project Name in English '.$i, 'description' => 'Project description in English '.$i, 'created_at' => now(), 'updated_at' => now()],
                ['project_id' => $projectId, 'locale' => 'ar', 'name' => 'اسم المشروع بالعربية '.$i, 'description' => 'وصف المشروع بالعربية '.$i, 'created_at' => now(), 'updated_at' => now()],
            ];

            DB::table('project_translations')->insert($translations);

            // Seed the 'project_images' table
            $images = [
                ['project_id' => $projectId, 'image' => 'default-image'.$i.'-1.jpg', 'created_at' => now(), 'updated_at' => now()],
                ['project_id' => $projectId, 'image' => 'default-image'.$i.'-2.jpg', 'created_at' => now(), 'updated_at' => now()],
            ];

            DB::table('project_images')->insert($images);
        }
    }
}
