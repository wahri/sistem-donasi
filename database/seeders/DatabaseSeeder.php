<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user1 = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@web.com',
        ]);
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Contributor']);
        $role3 = Role::create(['name' => 'Institution']);
        $user1->assignRole($role1);
        
    }
}
