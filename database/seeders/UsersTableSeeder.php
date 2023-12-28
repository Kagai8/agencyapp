<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        User::create([
            'name' => 'Quincy Kagai',
            'email' => 'quincykagai@gmail.com',
            'password' => Hash::make('Njoroge@88'),
            'role_id' => 4,
        ]);
    }
}
