<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\EquipoAdmin;
use App\Livewire\Contact;
use App\Livewire\Home;
use App\Livewire\Join;
use App\Livewire\Login;
use App\Livewire\Projects;
use App\Livewire\Services;
use App\Livewire\Technologies;
use App\Livewire\Team;
use App\Livewire\Us;

Route::get('/', Home::class)->name('home');
Route::get('/nosotros', Us::class)->name('us');
Route::get('/servicios', Services::class)->name('services');
Route::get('/proyectos', Projects::class)->name('projects');
Route::get('/tecnologias', Technologies::class)->name('technologies');
Route::get('/equipo', Team::class)->name('team');
Route::get('/contacto', Contact::class)->name('contact');
Route::get('/unete', Join::class)->name('join');
Route::get('/iniciar-sesion', Login::class)->name('login');
Route::get('/admin', Dashboard::class)->middleware(['auth', 'admin'])->name('admin.dashboard');
Route::get('/admin/equipo', EquipoAdmin::class)->middleware(['auth', 'admin'])->name('admin.equipo');
