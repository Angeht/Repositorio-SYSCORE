.<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cargo');  
            $table->text('descripcion')->nullable();
            $table->string('foto')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->integer('orden')->default(0); 
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('equipo');
    }
};
