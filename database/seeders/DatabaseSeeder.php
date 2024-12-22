<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder; // تأكد من استيراد Seeder بشكل صحيح
use Database\Seeders\PermissionSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\SettingSeeder;
use Database\Seeders\SettingTranslationSeeder;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\PackageSeeder;
use Database\Seeders\ProjectSeeder;
use Database\Seeders\ArticleSeeder;
use Database\Seeders\TestimonialSeeder; // استيراد الـ Seeder بشكل صحيح

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // استدعاء الـ Seeders المختلفة
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(SettingTranslationSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(TestimonialSeeder::class); // التأكد من استدعاء TestimonialSeeder هنا
        $this->call(SocialLinksSeeder::class); // التأكد من استدعاء TestimonialSeeder هنا
        $this->call(TermsTableSeeder::class); // التأكد من استدعاء TestimonialSeeder هنا
        $this->call(TermTranslationsTableSeeder::class); // التأكد من استدعاء TestimonialSeeder هنا
    }
}
