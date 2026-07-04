<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class projects_leng extends Model
{
    protected $table = 'projects_lengs';

    protected $fillable = [
        'fr_projects',
        'fr_lenguajes'
    ];
}
