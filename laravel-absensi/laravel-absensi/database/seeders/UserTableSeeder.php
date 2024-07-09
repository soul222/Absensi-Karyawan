<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions if they don't exist
        $permissions = [
            'admin.index',
            'karyawan.index',
            'karyawan.create',
            'karyawan.edit',
            'karyawan.delete',
            'permission.index',
            'role.index',
            'role.create',
            'role.edit',
            'role.delete',
            'lokasi.index',
            'monitoring.index',
            'laporan.absensi',
            'laporan.rekapabsensi',
            'izin.handle',
            'izin.cancel',
            // Add other permissions as needed
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles if they don't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Assign all permissions to admin role
        $adminRole->syncPermissions(Permission::all());

        // Create admin user if it doesn't exist
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'      => 'Administrator',
                'nip'       => '0110222134',
                'nik'       => '3174082812040007',
                'no_hp'     => '08834567890',
                'tgl_lahir' => '2004-12-28',
                'alamat'    => 'Bogor',
                'password'  => bcrypt('admin123'),
            ]
        );

        // Assign admin role to admin user
        if (!$adminUser->hasRole('admin')) {
            $adminUser->assignRole($adminRole);
        }

        // Create another user if it doesn't exist
        $user = User::firstOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name'      => 'User',
                'nip'       => '0110222148',
                'nik'       => '317408290102005',
                'no_hp'     => '081278904320',
                'tgl_lahir' => '2002-01-29',
                'alamat'    => 'Jakarta',
                'password'  => bcrypt('user123'),
            ]
        );

        // Assign user role to the user
        if (!$user->hasRole('user')) {
            $user->assignRole($userRole);
        }
    }
}
