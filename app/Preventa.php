<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Preventa extends Model
{
  use SoftDeletes;
  protected $table    = 'preventa';
  protected $fillable = ['id', 'nombres', 'apellidos', 'correo', 'carnet', 'fecha_nacimiento', 'telefono', 'genero', 'imagen'];
  protected $dates    = ['deleted_at'];
}
