<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use Database\Seeders\RolesSeeder;
Use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //Generate App Roles
            RolesSeeder::class,

            //Generate App Roles
            UserSeeder::class,
        ]);
    }
}
