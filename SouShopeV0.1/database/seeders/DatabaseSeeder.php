<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        
//         $role = Role::create(['name' => 'admin']);
//         $role2 = Role::create(['name' => 'client']);
//         $permission = Permission::create(['name' => 'admin']);
//         $permission2 = Permission::create(['name' => 'client']);

//         $role->syncPermissions($permission);
//         $role2->syncPermissions($permission2);
//         $user = User::find(2);
//         $user->assignRole('admin');
    }
}
