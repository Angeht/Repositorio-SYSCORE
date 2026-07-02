<?php

namespace Database\Seeders;

use App\Models\projects_libre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsLibreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project_leng = new projects_libre();
        $project_leng->fr_projects = 1;
        $project_leng->fr_librerias = 1;
        $project_leng->save();

        $project_leng = new projects_libre();
        $project_leng->fr_projects = 1;
        $project_leng->fr_librerias = 3;
        $project_leng->save();

        $project_leng = new projects_libre();
        $project_leng->fr_projects = 2;
        $project_leng->fr_librerias = 1;
        $project_leng->save();

        $project_leng = new projects_libre();
        $project_leng->fr_projects = 2;
        $project_leng->fr_librerias = 2;
        $project_leng->save();
    }
}
