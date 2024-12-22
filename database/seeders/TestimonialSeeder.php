<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    public function run()
    {
        // إدخال بيانات في جدول testimonials
        $testimonialIds = [];
        $testimonialIds[] = DB::table('testimonials')->insertGetId([
            'image' => 'testimonial1.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $testimonialIds[] = DB::table('testimonials')->insertGetId([
            'image' => 'testimonial2.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $testimonialIds[] = DB::table('testimonials')->insertGetId([
            'image' => 'testimonial3.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // إدخال بيانات في جدول testimonial_translations
        $translations = [
            [
                'testimonial_id' => $testimonialIds[0],
                'locale' => 'en',
                'name' => 'John Doe',
                'description' => 'This is a fantastic service!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'testimonial_id' => $testimonialIds[0],
                'locale' => 'ar',
                'name' => 'جون دو',
                'description' => 'هذه خدمة رائعة!',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'testimonial_id' => $testimonialIds[1],
                'locale' => 'en',
                'name' => 'Jane Smith',
                'description' => 'I am very satisfied with the service.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'testimonial_id' => $testimonialIds[1],
                'locale' => 'ar',
                'name' => 'جين سميث',
                'description' => 'أنا راضية للغاية عن الخدمة.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'testimonial_id' => $testimonialIds[2],
                'locale' => 'en',
                'name' => 'Alice Johnson',
                'description' => 'Highly recommend! Excellent experience.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'testimonial_id' => $testimonialIds[2],
                'locale' => 'ar',
                'name' => 'أليس جونسون',
                'description' => 'أوصي بشدة! تجربة ممتازة.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('testimonial_translations')->insert($translations);
    }
}
