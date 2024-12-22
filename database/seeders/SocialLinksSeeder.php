<?php

namespace Database\Seeders;

use App\Models\SocialLinks;
use App\Models\SocialLinksTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Facebook
        $facebook = SocialLinks::create([
            'link' => 'https://www.facebook.com',
            'icon' => 'fab fa-facebook-f',
        ]);

        SocialLinksTranslation::create([
            'social_links_id' => $facebook->id,
            'locale' => 'ar',
            'name' => 'فيسبوك',
        ]);

        SocialLinksTranslation::create([
            'social_links_id' => $facebook->id,
            'locale' => 'en',
            'name' => 'Facebook',
        ]);

        // Twitter
        $twitter = SocialLinks::create([
            'link' => 'https://www.twitter.com',
            'icon' => 'fab fa-twitter',
        ]);

        SocialLinksTranslation::create([
            'social_links_id' => $twitter->id,
            'locale' => 'ar',
            'name' => 'تويتر',
        ]);

        SocialLinksTranslation::create([
            'social_links_id' => $twitter->id,
            'locale' => 'en',
            'name' => 'Twitter',
        ]);

        // Behance
        $behance = SocialLinks::create([
            'link' => 'https://www.behance.net',
            'icon' => 'fab fa-behance',
        ]);

        SocialLinksTranslation::create([
            'social_links_id' => $behance->id,
            'locale' => 'ar',
            'name' => 'بيهانس',
        ]);

        SocialLinksTranslation::create([
            'social_links_id' => $behance->id,
            'locale' => 'en',
            'name' => 'Behance',
        ]);

        // Instagram
        $instagram = SocialLinks::create([
            'link' => 'https://www.instagram.com',
            'icon' => 'fab fa-instagram',
        ]);

        SocialLinksTranslation::create([
            'social_links_id' => $instagram->id,
            'locale' => 'ar',
            'name' => 'انستجرام',
        ]);

        SocialLinksTranslation::create([
            'social_links_id' => $instagram->id,
            'locale' => 'en',
            'name' => 'Instagram',
        ]);
    }
}
