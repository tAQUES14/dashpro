<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Criando permissões
        $permissions = [
            'index-user',
            'show-user',
            'create-user',
            'edit-user',
            'edit-user-password',
            'destroy-user',

            'index-course',
            'show-course',
            'create-course',
            'edit-course',
            'destroy-course',

            'index-classe',
            'show-classe',
            'create-classe',
            'edit-classe',
            'destroy-classe',

             'index-role',
        ];

        // Criando as permissões se não existirem
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Criando os papéis
        $adminRole = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        $professorRole = Role::firstOrCreate(['name' => 'Professor', 'guard_name' => 'web']);
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $tutorRole = Role::firstOrCreate(['name' => 'Tutor', 'guard_name' => 'web']);  // Criando o papel Tutor

        // Associando permissões aos papéis
        $adminPermissions = [
            'index-user',
            'show-user',
            'create-user',
            'edit-user',
            'edit-user-password',
            'destroy-user',
            'index-course',
            'show-course',
            'create-course',
            'edit-course',
            'destroy-course',
            'index-classe',
            'show-classe',
            'create-classe',
            'edit-classe',
            'destroy-classe',
            'index-role',
        ];

        $professorPermissions = [
            'index-course',
            'show-course',
            'create-course',
            'edit-course',
            'destroy-course',
            'index-classe',
            'show-classe',
            'create-classe',
            'edit-classe',
            'destroy-classe',
        ];

        $superAdminPermissions = $permissions; // SuperAdmin tem todas as permissões

        $tutorPermissions = [
            'index-course',
            'show-course',
            'create-course',
            'edit-course',
            'destroy-course',
            'index-classe',
            'show-classe',
            'create-classe',
            'edit-classe',
            'destroy-classe',
        ];

        // Sincronizando as permissões com os papéis
        $adminRole->syncPermissions($adminPermissions);
        $professorRole->syncPermissions($professorPermissions);
        $superAdminRole->syncPermissions($superAdminPermissions);
        $tutorRole->syncPermissions($tutorPermissions);  // Associando permissões ao papel Tutor
    }
}
