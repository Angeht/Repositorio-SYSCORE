<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class librerias extends Model
{
    protected $table = 'librerias';

    protected $primaryKey = 'idlibreria';

    public $incrementing = true;
    
    protected $keyType = 'int';

    protected $fillable = [
        'descripcion_libreria',
        'formato_libreria',
        'ruta_libreria'
    ];
}
