<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ejecutamos el seeder que crea el usuario administrador
        $this->call(AdminUserSeeder::class);
    }
}


