<?php

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
        Schema::create('projects_libres', function (Blueprint $table) {
            $table->id('idproject_libre');
            $table->bigInteger('fr_projects')->unsigned();
            $table->bigInteger('fr_librerias')->unsigned();
            $table->foreign('fr_librerias')->references('idlibreria')->on('librerias');
            $table->foreign('fr_projects')->references('idproject')->on('projects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_libres');
    }
};
