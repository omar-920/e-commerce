<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'The Auther',
            'email' => 'omarhessain920@gmail.com',
            'password' => Hash::make('123456'), 
            'role' => 'auther',
        ]);
    }
}
