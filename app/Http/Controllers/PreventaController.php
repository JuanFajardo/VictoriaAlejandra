<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Preventa;

class PreventaController extends Controller
{
  public function angular(){
    return view('preventa.index');
  }
  public function angularlistar(){
    return view('preventa.listar');
  }

  public function index(){
    $datos = Preventa::all()->where('reserva','=','0');
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

            'telefono'    => 'required|numeric',
            'genero'    =>  'required'
        ]);
      if ( count($v->errors()) > 0 ){
            return response()->json(array("respuesta"=>"500_NO"));
      }else{
        $request['reserva'] = 0;
        $request['imagen'] = "";
        $dato = new Preventa;
        $dato->fill( $request->all() );
        $dato->save();
        return response()->json(array("respuesta"=>"200_OK"));
      }
    } catch (Exception $e) {
      return "MensajeError -> ".$e->getMessage();
    }

  }
  public function update(Request $request){
    try {
          $dato = Preventa::find($id);
          $dato->fill( $request->all() );
          $dato->save();
          return response()->json(array("respuesta"=>"200_OK"));
    } catch (Exception $e) {
      return "MensajeError -> ".$e->getMessage();
    }

  }

  public function destroy($id){
  }

}
