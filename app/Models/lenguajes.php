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
}
