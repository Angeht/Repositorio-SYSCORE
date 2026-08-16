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
        'descripcion',
    ];

    public function lenguajes()
    {
        return $this->belongsToMany(
            lenguajes::class,
            'projects_lengs',
            'fr_projects',
            'fr_lenguajes',
            'idproject',
            'idlenguaje'
        );
    }

    public function libreriascss()
    {
        return $this->belongsToMany(
            librerias_css::class,
            'projects_librecsses',
            'fr_projects',
            'fr_librerias_csses',
            'idproject',
            'idlibreriacss'
        );
    }

    public function librerias()
    {
        return $this->belongsToMany(
            librerias::class,
            'projects_libres',
            'fr_projects',
            'fr_librerias',
            'idproject',
            'idlibreria'
        );
    }
}
