<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Nivel extends Model
{
  use SoftDeletes;
  protected $table    = 'nivels';
  protected $fillable = ['id', 'piso', 'bloque'];
  protected $dates    = ['deleted_at'];
}
