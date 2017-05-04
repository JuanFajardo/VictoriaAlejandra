<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stand extends Model
{
    use SoftDeletes;
    protected $table    = 'stands';
    protected $fillable = ['id', 'nom_empresa', 'cant_personal', 'cant_per_reg', 'descripcion', 'encargado', 'direccion', 'telefono', 'logo', 'user_id'];
    protected $dates    = ['deleted_at'];
}
