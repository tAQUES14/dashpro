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
            User::create([
                'name' => 'Marcos',
                'email' => 'marcostaques13@celke.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }
        
        if (!User::where('email', 'carol@gmail.com')->first()) {
            User::create([
                'name' => 'Carol',
                'email' => 'carol@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }
        

    }
}
