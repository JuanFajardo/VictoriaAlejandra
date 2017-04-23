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
    $request['user_id'] = 1;
    $dato = new Horario;
    $dato->fill( $request->all() );
    $dato->save();
    return response()->json(array("respuesta"=>"200_OK"));
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
