<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\User::factory()->create([
            
            'email' => 'superadmin@gmail.com',
            'full_name' => 'Super Admin',
            'country' => 'United States',
            'username' => 'superadmin',
            
            'email_verified_at' => now(),
            'password' => 'password', // password
            'remember_token' => Str::random(10),
            'user_type' => 0,

            'is_approved' =>  1,
        ]);

    }
}
