<?php

namespace Database\Seeders;

use App\Models\projects_leng;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsLengSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project_leng = new projects_leng();
        $project_leng->fr_projects = 1;
        $project_leng->fr_lenguajes = 1;
        $project_leng->save();

        $project_leng = new projects_leng();
        $project_leng->fr_projects = 1;
        $project_leng->fr_lenguajes = 2;
        $project_leng->save();

        $project_leng = new projects_leng();
        $project_leng->fr_projects = 2;
        $project_leng->fr_lenguajes = 1;
        $project_leng->save();

        $project_leng = new projects_leng();
        $project_leng->fr_projects = 2;
        $project_leng->fr_lenguajes = 2;
        $project_leng->save();
    }
}
