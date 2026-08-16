<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Crea un usuario por cada rol para poder iniciar sesion.
     *
     * Nota: el rol es un campo string en la tabla users (columna `role`).
     * Solo el rol `admin` tiene acceso al panel /admin.
     */
    public function run(): void
    {
        if (! app()->environment(['local', 'testing'])) {
            return;
        }

        foreach ($this->users() as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user,
            );
        }
    }

    /**
     * @return array<int, array<string, string>>
     */
    private function users(): array
    {
        return [
            [
                'name' => 'Administrador SysCore',
                'email' => 'admin@syscore.dev',
                'password' => 'admin12345',
                'role' => 'admin',
            ],
            [
                'name' => 'Editor SysCore',
                'email' => 'editor@syscore.dev',
                'password' => 'editor12345',
                'role' => 'editor',
            ],
            [
                'name' => 'Usuario SysCore',
                'email' => 'user@syscore.dev',
                'password' => 'user12345',
                'role' => 'user',
            ],
        ];
    }
}
