<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
  use SoftDeletes;
  protected $table    = 'personas';
  protected $fillable = ['id', 'nombres', 'direccion', 'telefono', 'carnet', 'tarjeta', 'profesion', 'genero', 'clave',  'encargado', 'imagen',  'stand_id', 'user_id'];
  //'reserva','horario_id','fecha_inscripcion','estado_civil', 'fecha_nacimiento', 
  protected $dates    = ['deleted_at'];
}
