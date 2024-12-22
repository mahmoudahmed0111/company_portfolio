<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermsTableSeeder extends Seeder
{
    public function run()
    {
        // Insert a default term into the 'terms' table
        DB::table('terms')->insert([
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
