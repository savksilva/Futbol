<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Equipo extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

    protected $fillable = [
        'id_equipo',
        'nombre_equipo',
        'imagen_bandera',
        'escudo_equipo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     protected $table      = 'equipo';
     public $timestamps    = false;
    protected $primaryKey = 'id_equipo';
}
