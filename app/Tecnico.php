<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Tecnico extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

    protected $fillable = [
        'id_tecnico',
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'nacionalidad',
        'rol',
        'equipo_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     protected $table      = 'tecnicos';
     public $timestamps    = false;
    protected $primaryKey = 'id_jugador';
}
