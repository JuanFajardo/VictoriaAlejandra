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
      $v = \Validator::make($request->all(), [
            'horario'    => 'required',
            'ingreso_am' => 'required|date_format:H:i:s',
            'salida_am'  => 'required|date_format:H:i:s',
            'ingreso_pm'  => 'required|date_format:H:i:s',
            'salida_pm'  => 'required|date_format:H:i:s',
            'tolerancia' => 'required|numeric',
            'user_id' => 'required'
        ]);
      if ( count($v->errors()) > 0 ){
            return response()->json(array("respuesta"=>"500_NO"));
      }else{
        $dato = new Horario;
        $dato->fill( $request->all() );
        $dato->save();
        return response()->json(array("respuesta"=>"200_OK"));
      }
    } catch (Exception $e) {
      return "MensajeError -> ".$e->getMessage();
    }

  }

  public function update(Request $request, $id){
    $request['user_id'] = 1;
    $v = \Validator::make($request->all(), [
          'horario'    => 'required',
          'ingreso_am' => 'required|date_format:H:i:s',
          'salida_am'  => 'required|date_format:H:i:s',
          'ingreso_pm'  => 'required|date_format:H:i:s',
          'salida_pm'  => 'required|date_format:H:i:s',
          'tolerancia' => 'required|numeric',
          'user_id' => 'required'
      ]);
    if ( count($v->errors()) > 0 ){
          return response()->json(array("respuesta"=>"500_NO"));
    }else{
      $dato = Horario::find($id);
      $dato->fill( $request->all() );
      $dato->save();
      return response()->json(array("respuesta"=>"200_OK"));
    }
  }

  public function destroy($id){
    $dato = Horario::find($id);
    $dato->delete();
    return response()->json(array("respuesta"=>"200_OK"));
  }

}
