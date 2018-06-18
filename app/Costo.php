<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Costo extends Model
{
  use SoftDeletes;
  protected $table    = 'costos';
  protected $fillable = ['id', 'tipo', 'precio'];
  protected $dates    = ['deleted_at'];
}
