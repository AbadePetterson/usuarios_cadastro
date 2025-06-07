<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar o primeiro usuário administrador
        User::create([
            'name' => 'Administrador',
            'cpf' => '12345678901',
            'email' => 'admin@sistema.com',
            'birth_date' => '1990-01-01',
            'phone' => '(11) 99999-9999',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
        ]);
    }
}
