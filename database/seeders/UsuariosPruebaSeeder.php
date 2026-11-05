<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuariosPruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            ['name' => 'Admin 1', 'email'=>'admin1@uatf.edu.bo', 'rol'=>'admin'],
            ['name' => 'Admin 2', 'email'=>'admin2@uatf.edu.bo', 'rol'=>'admin'],
            ['name' => 'Ana Ortiz', 'email'=>'ana@uatf.edu.bo', 'rol'=>'usuario'],
            ['name' => 'Jaime Choque', 'email'=>'jaime@uatf.edu.bo', 'rol'=>'usuario'],
        ];

        foreach($usuarios as $datos) {
            $user = User::firstOrNew(['email' => $datos['email']]);

            $user->name = $datos['name'];
            $user->password = Hash::make('password');
            $user->email_verified_at = now();
            $user->rol = $datos['rol'];
            $user->save();
        }
    }
}
