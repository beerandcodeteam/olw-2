<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Manager',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Seller',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Client',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        Role::insert($roles);
    }
}
