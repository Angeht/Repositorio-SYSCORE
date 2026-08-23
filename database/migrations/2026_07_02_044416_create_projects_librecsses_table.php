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
        Schema::create('projects_librecsses', function (Blueprint $table) {
            $table->id('idproject_librecss');
            $table->bigInteger('fr_librerias_csses')->unsigned();
            $table->bigInteger('fr_projects')->unsigned();
            $table->foreign('fr_librerias_csses')->references('idlibreriacss')->on('librerias_csses')->cascadeOnDelete();
            $table->foreign('fr_projects')->references('idproject')->on('projects')->cascadeOnDelete();
            $table->unique(['fr_projects', 'fr_librerias_csses']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_librecsses');
    }
};
