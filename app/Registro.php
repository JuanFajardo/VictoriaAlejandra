<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registro extends Model
{
    use SoftDeletes;
    protected $table    = 'registros';
    protected $fillable = ['id', 'fecha', 'ingreso', 'salida', 'tarjeta', 'persona_id', 'stand_id', 'user_id'];
    //['id', 'fecha', 'ingreso_am', 'salida_am', 'ingreso_pm', 'salida_pm', 'justificacion', 'retraso_am', 'retraso_pm', 'persona_id', 'horario_id', 'stand_id', 'user_id'];
    protected $dates    = ['deleted_at'];

}
