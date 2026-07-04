<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class projects_libre extends Model
{
    protected $table = 'projects_libres';

    protected $fillable = [
        'fr_projects',
        'fr_librerias'
    ];
}
