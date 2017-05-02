<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cargo extends Model
{
    use SoftDeletes;
    protected $table    = 'cargos';
    protected $fillable = ['id', 'cargo', 'descripcion','horario_id', 'user_id'];
    protected $dates    = ['deleted_at'];
}
