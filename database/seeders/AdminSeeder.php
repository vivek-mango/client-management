<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'Admin',
            'email' => 'admin@mailinator.com',
            'password' => '$2y$12$HXwi3jWSnaaa4gBXl3J/L.yMPSi/XFqtrBah.2O0/OQrrJMcPPoC2',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($data);
    }
}
