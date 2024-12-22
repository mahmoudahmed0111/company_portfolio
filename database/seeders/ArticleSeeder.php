<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            // Seed the 'articles' table
            $articleId = DB::table('articles')->insertGetId([
                'image' => '/public/assett/img/', // Unique image for each record
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Seed the 'article_translations' table
            $translations = [
                ['article_id' => $articleId, 'locale' => 'en', 'name' => 'Article Name in English '.$i, 'description' => 'Article description in English '.$i, 'created_at' => now(), 'updated_at' => now()],
                ['article_id' => $articleId, 'locale' => 'ar', 'name' => 'اسم المقالة بالعربية '.$i, 'description' => 'وصف المقالة بالعربية '.$i, 'created_at' => now(), 'updated_at' => now()],
            ];

            DB::table('article_translations')->insert($translations);
        }
    }
}

