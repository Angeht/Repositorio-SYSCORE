<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Contact;
use App\Livewire\Home;
use App\Livewire\Projects;
use App\Livewire\Services;
use App\Livewire\Technologies;
use App\Livewire\Us;

Route::get('/', Home::class)->name('home');
Route::get('/nosotros', Us::class)->name('us');
Route::get('/servicios', Services::class)->name('services');
Route::get('/proyectos', Projects::class)->name('projects');
Route::get('/tecnologias', Technologies::class)->name('technologies');
Route::get('/contacto', Contact::class)->name('contact');
