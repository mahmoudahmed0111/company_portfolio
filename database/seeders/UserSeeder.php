<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void {
        $user = User::create([
            'name'     => 'محمود احمد',
            'email'    => 'm@gmail.com',
            'password' => bcrypt('password'),
            'phone'    => '01013114673',
            'address'  => 'بنى سويف',

        ]);

        $user->addRole('superadmin');
    }
}
