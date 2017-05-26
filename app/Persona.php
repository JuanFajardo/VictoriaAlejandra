<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
  use SoftDeletes;
  protected $table    = 'personas';
  protected $fillable = ['id', 'nombres', 'direccion', 'telefono', 'carnet', 'estado_civil', 'profesion', 'genero', 'clave', 'imagen', 'fecha_nacimiento', 'fecha_inscripcion', 'cargo_id', 'horario_id', 'stand_id', 'user_id'];
  protected $dates    = ['deleted_at'];
}
