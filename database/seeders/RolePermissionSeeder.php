<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage brands',
            'manage catalogues',
            'manage products',
            'manage users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        $adminRole = Role::firstOrCreate([
            'name' => 'admin'
        ]);

        $adminPermissions = [
            'manage brands',
            'manage catalogues',
            'manage products'
        ];

        $adminRole->syncPermissions($adminPermissions);

        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin'
        ]);

        $user = User::create([
            'name' => 'Super Admin',
            'avatar' => 'images/default_avatar.jpg',
            'status' => 1,
            'email' => 'magang.designer@detik.com',
            'password' => bcrypt('!dtkSuperAdmin20'),
        ]);

        $user->assignRole($superAdminRole);
    }
}
