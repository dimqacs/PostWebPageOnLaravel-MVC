<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (RoleEnum::cases() as $role) {
            Role::create([
                'name' => $role->value
            ]);
        }

        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superAdmin@admin.com',
            'password' => Hash::make('1234567890'),
        ]);

        $superAdmin->assignRole(RoleEnum::SUPER_ADMIN);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('1234567890'),
        ]);

        $admin->assignRole(RoleEnum::ADMIN);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('1234567890'),
        ]);

        $user->assignRole(RoleEnum::USER);

    }
}
