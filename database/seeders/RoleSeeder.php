<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $adminEmail = (string) env('ADMIN_EMAIL', 'admin@syscore.dev');
        $adminPassword = env('ADMIN_PASSWORD');

        if (! is_string($adminPassword) || $adminPassword === '') {
            if (app()->environment(['local', 'testing'])) {
                $adminPassword = 'admin12345';
            } else {
                throw new \RuntimeException('Define ADMIN_PASSWORD en el .env antes de ejecutar el seeder.');
            }
        }

        User::updateOrCreate(
            ['email' => $adminEmail],
            [
                'name' => 'Administrador SysCore',
                'password' => $adminPassword,
                'role' => 'admin',
            ]
        );
    }
}
