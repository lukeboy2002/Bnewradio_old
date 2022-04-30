<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()
            ->times(20)
            ->create();

//        $user = User::create([
//            'username' => 'admin',
//            'email' => 'admin@admin.com',
//            'email_verified_at' => now(),
//            'password' => bcrypt('adminadmin'),
//            'avatar' => '/images/avatars/admin.png',
//            'remember_token' => Str::random(10),
//        ]);
    }
}
