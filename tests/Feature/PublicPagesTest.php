<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_all_public_pages_render_successfully(): void
    {
        $this->seed();

        foreach (['home', 'us', 'services', 'projects', 'technologies', 'team', 'contact', 'login'] as $route) {
            $this->get(route($route))->assertOk();
        }

        $this->get('/unete')->assertNotFound();
    }
}
