<?php

namespace Tests\Feature;

use App\Livewire\Login;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AdminLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_login_and_reach_dashboard(): void
    {
        User::factory()->create([
            'email' => 'admin@syscore.dev',
            'password' => 'admin12345',
            'role' => 'admin',
        ]);

        Livewire::test(Login::class)
            ->set('email', 'admin@syscore.dev')
            ->set('password', 'admin12345')
            ->call('login')
            ->assertRedirect(route('admin.dashboard'));

        $this->get(route('admin.dashboard'))
            ->assertOk();
    }

    public function test_non_admin_cannot_login_to_admin_panel(): void
    {
        User::factory()->create([
            'email' => 'user@syscore.dev',
            'password' => 'user12345',
            'role' => 'user',
        ]);

        Livewire::test(Login::class)
            ->set('email', 'user@syscore.dev')
            ->set('password', 'user12345')
            ->call('login')
            ->assertHasErrors(['email']);

        $this->assertGuest();
    }

    public function test_non_admin_user_gets_forbidden_on_admin_route(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $this->actingAs($user)
            ->get(route('admin.dashboard'))
            ->assertForbidden();
    }
}
