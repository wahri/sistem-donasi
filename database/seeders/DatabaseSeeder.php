<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ContributorProfile;
use App\Models\InstitutionProfile;
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
            'email' => 'admin@example.com',
        ]);
        $role1 = Role::create(['name' => 'Admin']);
        $user1->assignRole($role1);

        $user2 = User::factory()->create([
            'name' => 'Contributor',
            'email' => 'contributor@example.com',
        ]);
        $role2 = Role::create(['name' => 'Contributor']);
        $user2->assignRole($role2);
        $contributorProfile = ContributorProfile::create([
            'user_id' => $user2->id,
            'company' => 'Kota Buana',
            'phone' => '0812 7572 6466',
        ]);
        $user2->profile()->associate($contributorProfile);
        $user2->save();

        $user3 = User::factory()->create([
            'name' => 'Institution',
            'email' => 'institution@example.com',
        ]);
        $role3 = Role::create(['name' => 'Institution']);
        $user3->assignRole($role3);
        $institutionProfile = InstitutionProfile::create([
            'user_id' => $user3->id,
            'company' => 'Panti Asuhan',
            'phone' => '0812 1234 1234',
        ]);
        $user3->profile()->associate($institutionProfile);
        $user3->save();
    }
}
