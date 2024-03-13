<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdditionalUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Quincy Minister',
            'email' => 'minister@gmail.com',
            'password' => Hash::make('Njoroge@88'),
            'role_id' => 5,
        ]);
    }
}
