<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
          DB::table('users')->insert([
           'name' => 'patata',
            'email' => 'jl.toscano@hotmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('patata12'), // password
            'role' => "admin",
            'biography' => "Me gustan las patatas",
            "gender" => "female",
            'profile_photo_path' => 'profile-photos/BigChungus.png',
            'created_at'=>now(),
        ]);
        

        \App\Models\User::factory(25)->create(); 
    }
}
