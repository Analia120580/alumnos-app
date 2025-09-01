<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        
        // Alumno 1
        User::create([
            'name' => 'María Pérez',
            'email' => 'maria.perez@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'Alumno',
            'whatsapp' => '5491187654321',
            'professional_url' => 'https://linkedin.com/in/maria-perez',
        ]);

        // Alumno 2
        User::create([
            'name' => 'Juan González',
            'email' => 'juan.gonzalez@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'Alumno',
            'whatsapp' => '549116543210',
            'professional_url' => 'https://linkedin.com/in/juan-gonzalez',
        ]);
        // Administrador 1: López Analia
          User::create([
            'name' => 'López Analia',
            'email' => 'lopezanaliaelizabeth66@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'Administrador',
            'whatsapp' => null,
            'professional_url' => 'https://github.com/Analia1205',
        ]);

        // Administrador 2: Romero Sergio
        User::create([
            'name' => 'Romero Sergio',
            'email' => 'romerosergiovalentino@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'Administrador',
            'whatsapp' => '54911XXXXXXX', // reemplaza con su número si quieres
            'professional_url' => 'https://github.com/Sergio-Valentino',
        ]);
    }
}

