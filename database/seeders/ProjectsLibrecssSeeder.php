<?php

namespace Database\Seeders;

use App\Models\projects_librecss;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsLibrecssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project_leng = new projects_librecss();
        $project_leng->fr_projects = 1;
        $project_leng->fr_librerias_csses = 1;
        $project_leng->save();

        $project_leng = new projects_librecss();
        $project_leng->fr_projects = 2;
        $project_leng->fr_librerias_csses = 1;
        $project_leng->save();
    }
}
