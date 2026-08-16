<?php

namespace Tests\Feature;

use App\Livewire\Admin\ProjectsAdmin;
use App\Models\Project;
use App\Models\User;
use Database\Seeders\LenguajesSeeder;
use Database\Seeders\LibreriasCssSeeder;
use Database\Seeders\LibreriasSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class AdminProjectsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_update_and_delete_a_project_safely(): void
    {
        Storage::fake('public');
        $this->seed([LenguajesSeeder::class, LibreriasSeeder::class, LibreriasCssSeeder::class]);

        $admin = User::factory()->create(['role' => 'admin']);

        Livewire::actingAs($admin)
            ->test(ProjectsAdmin::class)
            ->set('title', 'Proyecto de prueba')
            ->set('descripcion', 'Proyecto utilizado para comprobar el flujo administrativo completo.')
            ->set('link', 'https://example.com/proyecto')
            ->set('lenguajesSeleccionados', [1])
            ->set('libreriasSeleccionadas', [1])
            ->set('libreriasCssSeleccionadas', [1])
            ->set('ruta', UploadedFile::fake()->image('proyecto.jpg', 1200, 800)->size(500))
            ->call('guardarProject')
            ->assertHasNoErrors();

        $project = Project::query()->firstOrFail();
        $originalPath = $project->ruta;
        Storage::disk('public')->assertExists($originalPath);

        $component = Livewire::actingAs($admin)
            ->test(ProjectsAdmin::class)
            ->call('actualizarProject', $project->getKey())
            ->set('title', 'Proyecto actualizado')
            ->call('guardarProject')
            ->assertHasNoErrors();

        $project->refresh();
        $this->assertSame('Proyecto actualizado', $project->title);
        $this->assertSame($originalPath, $project->ruta);
        Storage::disk('public')->assertExists($originalPath);

        $component
            ->call('confirmarEliminar', $project->getKey())
            ->call('eliminarProject')
            ->assertHasNoErrors();

        $this->assertDatabaseMissing('projects', ['idproject' => $project->getKey()]);
        Storage::disk('public')->assertMissing($originalPath);
    }
}
