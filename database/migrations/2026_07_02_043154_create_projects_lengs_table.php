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
        Schema::create('projects_lengs', function (Blueprint $table) {
            $table->id('idproject_leng');
            $table->bigInteger('fr_projects')->unsigned();
            $table->bigInteger('fr_lenguajes')->unsigned();
            $table->foreign('fr_lenguajes')->references('idlenguaje')->on('lenguajes');
            $table->foreign('fr_projects')->references('idproject')->on('projects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_lengs');
    }
};
