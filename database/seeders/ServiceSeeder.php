<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            // Seed the 'services' table
            $serviceId = DB::table('services')->insertGetId([
                'image' => 'default-image'.$i.'.jpg', // Unique image for each record
                'icon' => 'ti-mouse-alt', // Unique image for each record
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Seed the 'service_translations' table
            $translations = [
                ['service_id' => $serviceId, 'locale' => 'en', 'name' => 'Service Name in English '.$i, 'description' => 'Service description in English '.$i, 'created_at' => now(), 'updated_at' => now()],
                ['service_id' => $serviceId, 'locale' => 'ar', 'name' => 'اسم الخدمة بالعربية '.$i, 'description' => 'وصف الخدمة بالعربية '.$i, 'created_at' => now(), 'updated_at' => now()],
            ];

            DB::table('service_translations')->insert($translations);
        }
    }
}
