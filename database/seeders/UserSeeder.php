<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        //
        DB::table('users')->insert([
            'name' => 'souad el hirague',
            'email' => 'souadelhirague@gmail.com',
            'password' => Hash::make('Dgjb3348'),
            'remember_token' => Str::random(10),
             'profile_photo_path'=>asset('logo_image/'.logo.jpg),
        ]);
        // User::factory()
        // ->count(50)
        // ->hasPosts(1)
        // ->create();
      
    }
}
