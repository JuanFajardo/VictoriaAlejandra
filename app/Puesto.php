<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Puesto extends Model
{
  use SoftDeletes;
  protected $table    = 'puestos';
  protected $fillable = ['id', 'nombre', 'lado', 'tipo', 'dimension', 'estado', 'costo_id', 'nivel_id', 'user_id'];
  protected $dates    = ['deleted_at'];
}
