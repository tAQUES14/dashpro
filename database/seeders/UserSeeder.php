<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'marcostaques13@gmail.com')->first()) {
            $superAdmin = User::create([
                'name' => 'Marcos',
                'email' => 'marcostaques13@gmail.com',
                'password' => Hash::make('1234567', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $superAdmin->assignRole('Super Admin');
        }
        
        if (!User::where('email', 'marcostaques12@gmail.com')->first()) {
            $admin = User::create([
                'name' => 'Taques',
                'email' => 'marcostaques12@gmail.com',
                'password' => Hash::make('1234567', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $admin->assignRole('Admin');
        }
        
        if (!User::where('email', 'taques600@gmail.com')->first()) {
            $teacher = User::create([
               'name' => 'Taques',
                'email' => 'taques600@gmail.com',
                'password' => Hash::make('1234567', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $teacher->assignRole('Professor');
        }
        
        if (!User::where('email', 'meiazero@gmail.com')->first()) {
            $tutor = User::create([
                'name' => 'Eu',
                'email' => 'meiazero@gmail.com',
                'password' => Hash::make('1234567', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $tutor->assignRole('Tutor');
        }
        
        if (!User::where('email', 'carol@gmail.com')->first()) {
            $student = User::create([
                'name' => 'Carol',
                'email' => 'carol@gmail.com',
                'password' => Hash::make('1234567', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $student->assignRole('Aluno');
        }
    }
}
