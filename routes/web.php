<?php

use App\Livewire\Admin\LenguajeAdmin;
use App\Livewire\Admin\LibreriaCssAdmin;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\EquipoAdmin;
use App\Livewire\Admin\LibreriaAdmin;
use App\Livewire\Admin\ProjectsAdmin;
use App\Livewire\Contact;
use App\Livewire\Home;
use App\Livewire\Join;
use App\Livewire\Login;
use App\Livewire\Projects;
use App\Livewire\Services;
use App\Livewire\Team;
use App\Livewire\Technologies;
use App\Livewire\Us;

Route::get('/', Home::class)->name('home');
Route::get('/nosotros', Us::class)->name('us');
Route::get('/servicios', Services::class)->name('services');
/* Projects */
Route::get('/proyectos', Projects::class)->name('projects');
/*  */
Route::get('/tecnologias', Technologies::class)->name('technologies');
Route::get('/equipo', Team::class)->name('team');
Route::get('/contacto', Contact::class)->name('contact');
Route::get('/unete', Join::class)->name('join');
Route::get('/iniciar-sesion', Login::class)->name('login');
Route::get('/admin', Dashboard::class)->middleware(['auth', 'admin'])->name('admin.dashboard');

Route::get('/admin/equipo', EquipoAdmin::class)->middleware(['auth', 'admin'])->name('admin.equipo');
Route::get('/admin/proyectos', ProjectsAdmin::class)->middleware(['auth', 'admin'])->name('admin.proyectos');
Route::get('/admin/lenguajes', LenguajeAdmin::class)->middleware(['auth', 'admin'])->name('admin.lenguajes');
Route::get('/admin/librerias', LibreriaAdmin::class)->middleware(['auth', 'admin'])->name('admin.librerias');
Route::get('/admin/libreriacss', LibreriaCssAdmin::class)->middleware(['auth', 'admin'])->name('admin.libreriacss');

