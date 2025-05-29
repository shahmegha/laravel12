<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create Admin role User
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@demo.com',
        ])->assignRole(config('constant.ADMIN_ROLE_NAME'))->removeRole(config('constant.USER_ROLE_NAME'));

        //Create User Role 
        User::factory(10)->create();
    }
}
