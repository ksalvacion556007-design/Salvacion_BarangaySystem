<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ResidentSeeder::class,
            CertificateSeeder::class,
            ActivityLogSeeder::class, // add this
        ]);
    }
}