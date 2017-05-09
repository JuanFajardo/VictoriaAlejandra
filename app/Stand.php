<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stand extends Model
{
    use SoftDeletes;
    protected $table    = 'stands';
    protected $fillable = ['id', 'nom_empresa', 'cant_personal', 'descripcion', 'encargado', 'direccion', 'telefono', 'logo', 'user_id']; //'cant_per_reg',
    protected $dates    = ['deleted_at'];

    public function setLogoAttribute($logo){
      $this->attributes['logo'] = md5(date('Y_m_d_H_i_s_')).$logo->getClientOriginalName();
      $name = md5(date('Y_m_d_H_i_s_')).$logo->getClientOriginalName();
      \Storage::disk('local')->put($name, \File::get($logo));
    }
}
