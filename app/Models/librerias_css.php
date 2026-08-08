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
        'formato_libreriacss',
        'ruta_libreriacss',
    ];
}
