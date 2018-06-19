<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cobro extends Model
{
  use SoftDeletes;
  protected $table    = 'cobros';
  protected $fillable = ['id', 'empresa', 'encargado', 'telefono', 'monto', 'fecha', 'puesto_id', 'precio_id', 'stand_id', 'user_id'];
  protected $dates    = ['deleted_at'];
}
