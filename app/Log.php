<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Log extends Model
{
  use SoftDeletes;
  protected $table    = 'logs';
  protected $fillable = ['id', 'usuario', 'clave', 'ip', 'fecha'];
  protected $dates    = ['deleted_at'];
}
