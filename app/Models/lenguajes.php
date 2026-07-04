<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lenguajes extends Model
{
    protected $table = 'lenguajes';

    protected $primaryKey = 'idlenguaje';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'descripcion_lenguaje',
        'formato_lenguaje',
        'ruta_lenguaje',
    ];

    public function projects()
    {
        return $this->belongsToMany(
            project::class,
            'projects_lengs',
            'fr_projects',
            'fr_lenguajes',
            'idproject',
            'idlenguaje'
        );
    }
}
