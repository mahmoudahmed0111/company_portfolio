<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            // Seed the 'packages' table
            $packageId = DB::table('packages')->insertGetId([
                'type' => 'marketing', // You can change the type if needed (e.g., 'servers' or 'emails')
                'price' => (100 * $i), // Adjust the price to make each record unique
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Seed the 'package_translations' table
            $translations = [
                ['package_id' => $packageId, 'locale' => 'en', 'name' => 'Marketing Package '.$i, 'created_at' => now(), 'updated_at' => now()],
                ['package_id' => $packageId, 'locale' => 'ar', 'name' => 'باقة التسويق '.$i, 'created_at' => now(), 'updated_at' => now()],
            ];

            DB::table('package_translations')->insert($translations);

            // Seed the 'package_features' table
            $packageFeatureId = DB::table('package_features')->insertGetId([
                'package_id' => $packageId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Seed the 'package_features_translations' table
            $featureTranslations = [
                ['package_features_id' => $packageFeatureId, 'locale' => 'en', 'feature' => 'Feature '.$i.' description', 'created_at' => now(), 'updated_at' => now()],
                ['package_features_id' => $packageFeatureId, 'locale' => 'ar', 'feature' => 'وصف الميزة '.$i, 'created_at' => now(), 'updated_at' => now()],
            ];

            DB::table('package_features_translations')->insert($featureTranslations);
        }
    }
}

