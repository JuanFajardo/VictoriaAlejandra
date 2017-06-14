<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Preventa;

class PreventaController extends Controller
{
  public function angular(){
    return view('preventa.index');
  }

  public function index(){
    $datos = Preventa::all();
    return $datos;
  }

  public function show($id){
    $dato = Preventa::find($id);
    return $dato;
  }

  public function store(Request $request){
    try {
      $v = \Validator::make($request->all(), [
            'nombres'    => 'required',
            'apellidos'    => 'required',
            'correo'    => 'required',
            'carnet'    => 'required|numeric',
            'fecha_nacimiento' => 'required|date_format:H:i:s',
            'telefono'    => 'required|numeric',
            'genero'    =>  'required'
        ]);
      if ( count($v->errors()) > 0 ){
            return response()->json(array("respuesta"=>"500_NO"));
      }else{
        $dato = new Preventa;
        $dato->fill( $request->all() );
        $dato->save();
        return response()->json(array("respuesta"=>"200_OK"));
      }
    } catch (Exception $e) {
      return "MensajeError -> ".$e->getMessage();
    }

  }

  public function destroy($id){
    $dato = Horario::find($id);
    $dato->delete();
    return response()->json(array("respuesta"=>"200_OK"));
  }

}
