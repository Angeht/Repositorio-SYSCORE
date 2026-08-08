<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $primaryKey = 'idproject';

    public $incrementing = true;

    protected $fillable = [
        'title',
        'img',
        'formato',
        'ruta',
        'link',
        'descripcion'
    ];
}
