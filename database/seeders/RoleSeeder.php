<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $adminEmail = (string) config('auth.admin.email');
        $adminPassword = config('auth.admin.password');

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
