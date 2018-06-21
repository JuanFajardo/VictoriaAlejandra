<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stand extends Model
{
    use SoftDeletes;
    protected $table    = 'stands';
    protected $fillable = ['id', 'nom_empresa', 'generar_personal', 'cant_personal', 'descripcion', 'encargado', 'direccion', 'telefono', 'logo', 'user_id']; //'cant_per_reg',
    protected $dates    = ['deleted_at'];
}
