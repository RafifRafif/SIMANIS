<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;                
use Illuminate\Support\Facades\Hash; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([             
            'name' => 'Anantha',
            'username' => '3312411076',
            'password' => Hash::make('123456'),
            'role' => 'p4m',
        ]);
    }
}
