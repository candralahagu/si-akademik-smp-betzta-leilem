<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat role hanya jika belum ada
        $superadmin = Role::firstOrCreate(['name' => 'Super Admin']);
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $wali_kelas = Role::firstOrCreate(['name' => 'Wali Kelas']);
        $guru = Role::firstOrCreate(['name' => 'Guru']);
        $siswa = Role::firstOrCreate(['name' => 'Siswa']);

        // Buat permission jika belum ada (jika belum dibuat oleh PermissionSeeder)
        $permissions = [
            'create-user',
            'edit-user',
            'delete-user',
            'view-user'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Berikan permission ke role
        $admin->givePermissionTo(['create-user', 'edit-user', 'delete-user', 'view-user']);
        $wali_kelas->givePermissionTo(['view-user']);
        $guru->givePermissionTo(['view-user']);
        $siswa->givePermissionTo(['view-user']);
    }
}
