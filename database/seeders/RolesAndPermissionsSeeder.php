<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear permisos si no existen
        $permissions = [
            'create roles', 'assign roles', 'update roles', 'delete roles', 'view roles',
            'view users', 'create users', 'edit users', 'update users', 'delete users',
            'view reports', 'export reports', 'edit reports','add payroll',
            'edit payroll', 'delete payroll', 'view payroll'
        ];

        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }

        // Crear roles si no existen
        $roles = ['Admin', 'Director', 'Leader', 'Analyst', 'Reader User', 'Client'];

        foreach ($roles as $role) {
            if (!Role::where('name', $role)->exists()) {
                Role::create(['name' => $role]);
            }
        }

        // Asignar permisos a roles
        $adminRole = Role::where('name', 'Admin')->first();
        if ($adminRole) {
            $adminRole->syncPermissions(Permission::all());
        }

        $directorRole = Role::where('name', 'Director')->first();
        if ($directorRole) {
            $directorRole->syncPermissions(['view users', 'view reports', 'export reports', 'view payroll']);
        }

        $leaderRole = Role::where('name', 'Leader')->first();
        if ($leaderRole) {
            $leaderRole->syncPermissions([
                'create roles', 'assign roles', 'update roles', 'delete roles',
                'view users', 'create users', 'edit users', 'update users', 'delete users',
                'view reports', 'export reports', 'edit reports',
                'edit payroll', 'delete payroll', 'view payroll'
            ]);
        }

        $analystRole = Role::where('name', 'Analyst')->first();
        if ($analystRole) {
            $analystRole->syncPermissions([
                'view users', 'create users', 'edit users', 'update users', 'delete users',
                'view reports', 'export reports', 'edit reports',
                'edit payroll', 'delete payroll', 'view payroll'
            ]);
        }

        $readerUserRole = Role::where('name', 'Reader User')->first();
        if ($readerUserRole) {
            $readerUserRole->syncPermissions([
                'view users', 'view reports', 'export reports', 'view payroll'
            ]);
        }

        $clientRole = Role::where('name', 'Client')->first();
        if ($clientRole) {
            $clientRole->syncPermissions(['view payroll']);
        }
    }
}
