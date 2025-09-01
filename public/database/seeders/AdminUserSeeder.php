<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@demo.test'],
            [
                'name' => 'Docente Admin',
                'password' => bcrypt('admin12345'),

 'is_admin' => true,
                'phone' => '3704212896',
                'professional_url' => null,
                'photo_path' => null,
            ]
        );
    }
}

