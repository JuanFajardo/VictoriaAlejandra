<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;

class HorarioController extends Controller
{
  public function angular(){
    return view('horario.index');
  }

  public function index(){
    $datos = Horario::all();
    return $datos;
  }

  public function show($id){
    $dato = Horario::find($id);
    return $dato;
  }

  public function store(Request $request){
    try {
      $request['user_id'] = 1;

      $dato = new Horario;
      $v = \Validator::make($request->all(), [
            'ingreso_am' => 'required|date_format:HH:II:SS',
            'salida_am'  => 'required|date_format:HH:II:SS',
            'salida_pm'  => 'required|date_format:HH:II:SS',
            'salida_pm'  => 'required|date_format:HH:II:SS',
            'tolerancia' => 'required|numeric'
        ]);
        if ( $v->fails() ){
            return response()->json(array("respuesta"=>"500_NO"));
        }

      $dato->fill( $request->all() );
      $dato->save();
      return response()->json(array("respuesta"=>"200_OK"));
    } catch (Exception $e) {
      return "MensajeError -> ".$e->getMessage();
    }

  }

  public function update(Request $request, $id){
    $request['user_id'] = 1;
    $dato = Horario::find($id);
    $dato->fill( $request->all() );
    $dato->save();
    return response()->json(array("respuesta"=>"200_OK"));
  }

  public function destroy($id){
    $dato = Horario::find($id);
    $dato->delete();
    return response()->json(array("respuesta"=>"200_OK"));
  }

}
