<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Preventa;
use App\Persona;
class RegistroManualController extends Controller
{
  public function angular(){
    return view('registromanual.index');
  }

  public function index(){
    // $datos = Preventa::all()->where('reserva','=','0');
    $datos = \DB::table('repetitivos')->select('id', 'fecha', 'hora', 'categoria',  'sexo',
       'marcado', 'persona_id', 'horario_id','stand_id','user_id' )->get();
    return $datos;
  }
  public function show($id){
    $dato = Stand::find($id);
    return $dato;
  }
  public function store(Request $request){
    try {
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $categoria = ($request['opcion'] == "1")?"niños":(($request['opcion'] == "2")?"mujeres":(($request['opcion'] == "3")?"hombres":"ancianos"));
        $sexo = "NaN";
        $marcado = "ingreso";
        $persona_id = "777";
        $horario_id = "20";
        $stand_id = "20";
        $user_id = "1";
        \DB::table('repetitivos')->insert([
          'fecha' => $fecha,
          'hora' => $hora,
          'categoria' => $categoria,
          'sexo' => $sexo,
          'marcado' => $marcado,
          'persona_id' => $persona_id,
          'horario_id' => $horario_id,
          'stand_id' => $stand_id,
          'user_id' => $user_id
        ]);
          return response()->json(array("respuesta"=>"200_OK"));
    } catch (Exception $e) {
      return "MensajeError -> ".$e->getMessage();
    }

  }

}
