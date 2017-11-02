<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Jugador extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

    protected $fillable = [
        'id_jugador',
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'posicion_jugador',
        'numero_camisa',
        'titular',
        'foto_jugador',
        'equipo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     protected $table      = 'jugadores';
     public $timestamps    = false;
    protected $primaryKey = 'id_jugador';
}
