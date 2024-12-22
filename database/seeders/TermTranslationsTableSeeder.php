<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermTranslationsTableSeeder extends Seeder
{
    public function run()
    {
        // Get the first term from the 'terms' table
        $term = DB::table('terms')->first(); // Get the first inserted term

        // Insert translations for different locales (e.g., 'en' for English, 'ar' for Arabic)
        DB::table('term_translations')->insert([
            [
                'term_id' => $term->id,
                'locale' => 'en',
                'term1' => 'Terms and Conditions',
                'term2' => 'Please read the following terms carefully.',
                'term3' => 'By using our services, you agree to the terms outlined below.',
                'term4' => 'We reserve the right to update these terms at any time.',
                'term5' => 'Your continued use of our services constitutes acceptance of these terms.',
                'term6' => 'If you disagree with any part of the terms, you must stop using the services.',
                'term7' => 'For any inquiries, contact us at support@company.com.',
                'term8' => 'These terms are governed by the laws of the applicable jurisdiction.',
                'term9' => 'We do not accept liability for any losses arising from the use of our services.',
                'term10' => 'By continuing to browse our website, you acknowledge that you understand and accept these terms.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'term_id' => $term->id,
                'locale' => 'ar',
                'term1' => 'الشروط والأحكام',
                'term2' => 'يرجى قراءة الشروط التالية بعناية.',
                'term3' => 'باستخدام خدماتنا، أنت توافق على الشروط الموضحة أدناه.',
                'term4' => 'نحتفظ بالحق في تحديث هذه الشروط في أي وقت.',
                'term5' => 'استخدامك المستمر لخدماتنا يشكل قبولاً لهذه الشروط.',
                'term6' => 'إذا كنت لا توافق على أي جزء من الشروط، يجب عليك التوقف عن استخدام الخدمات.',
                'term7' => 'لأي استفسارات، يرجى الاتصال بنا على support@company.com.',
                'term8' => 'تخضع هذه الشروط لقوانين الولاية القضائية المعمول بها.',
                'term9' => 'نحن لا نقبل المسؤولية عن أي خسائر تنشأ عن استخدام خدماتنا.',
                'term10' => 'بمتابعتك لتصفح موقعنا الإلكتروني، فإنك تقر وتقبل هذه الشروط.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
