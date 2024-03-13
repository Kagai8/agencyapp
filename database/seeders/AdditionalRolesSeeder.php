<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class AdditionalRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Additional roles data
        $roles = [
            ['name' => 'Minister'],
            // Add more roles as needed
        ];

        // Insert data into the "roles" table
        Role::insert($roles);
    }
}
