<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Insert translations for different locales (e.g., 'en' for English, 'ar' for Arabic)
        $settings = DB::table('settings')->first(); // Get the first inserted setting

        DB::table('setting_translations')->insert([
            [
                'setting_id' => $settings->id,
                'locale' => 'en',
                'name' => 'Company Name',
                'address' => '123 Main Street, City, Country',
                'description' => 'Welcome to our company!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'setting_id' => $settings->id,
                'locale' => 'ar',
                'name' => 'اسم الشركة',
                'address' => '123 الشارع الرئيسي، المدينة، البلد',
                'description' => 'مرحبًا بكم في شركتنا!',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
