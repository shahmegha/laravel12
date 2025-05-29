<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //Truncate role table records
        Role::query()->delete();

        $roles = [config('constant.ADMIN_ROLE_NAME'),config('constant.USER_ROLE_NAME')];
        foreach($roles as $role){
            Role::create([
                'name'=>$role,
                'guard_name'=>'web'
            ]);
        }
    }
}