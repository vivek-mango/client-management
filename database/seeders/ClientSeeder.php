<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Seed with at least 20 clients
        for ($i = 0; $i < 20; $i++) {
            $clientType = $faker->randomElement([0, 1]);

            $data = [
                'company_name' => $faker->company,
                'company_email' => $faker->companyEmail,
                'client_type' => $clientType,
                'date_of_birth' => ($clientType == 0) ? $faker->date : null,
                'company_registration_number' => ($clientType == 1) ? $faker->randomNumber : null,
                'contact_name' => $faker->name,
                'contact_email' => $faker->safeEmail,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            DB::table('clients')->insert($data);
        }
    }
}
