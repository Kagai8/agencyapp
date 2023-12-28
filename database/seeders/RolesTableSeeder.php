<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Delete existing records to start fresh
        Role::truncate();

        // Insert roles
        $roles = [
            ['name' => 'User'],
            ['name' => 'Manager'],
            ['name' => 'Chairman'],
            ['name' => 'Admin'],
        ];

        // Insert data into the "roles" table
         Role::insert($roles);
    }
}
