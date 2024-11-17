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
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Criando papéis e associando permissões
        $adminRole = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        $professorRole = Role::firstOrCreate(['name' => 'Professor', 'guard_name' => 'web']);
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);

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
        ];

        // O professor pode visualizar e gerenciar cursos e aulas, mas não pode gerenciar usuários
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

        // Associando as permissões aos papéis
        $adminRole->syncPermissions($adminPermissions);
        $professorRole->syncPermissions($professorPermissions);
        $superAdminRole->syncPermissions($superAdminPermissions);
    }
}
