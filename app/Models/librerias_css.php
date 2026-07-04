<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class librerias_css extends Model
{
    protected $table = 'librerias_csses';

    protected $primaryKey = 'idlibreriacss';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'descripcion_libreriacss',
    ];

    public function projects()
    {
        return $this->belongsToMany(
            project::class,
            'projects_librecsses',
            'fr_projects',
            'fr_librerias_csses',
            'idproject',
            'idlibreriacss'
        );
    }
}
