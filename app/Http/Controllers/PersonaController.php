<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

class PersonaController extends Controller
{
  public function angular(){
    return view('personal.index');
  }

  public function index(){
    //$datos = Persona::all();
    $datos = \DB::table('personas')->join('cargos', 'personas.cargo_id', '=', 'cargos.id')
                                   ->join('horarios', 'personas.horario_id', '=', 'horarios.id')
    ->select('personas.*', 'horarios.horario', 'cargos.cargo')->get();

    return $datos;
  }

  public function show($id){
    $dato = Persona::find($id);
    return $dato;
  }

  public function store(Request $request){
    try {
      $request['user_id'] = 1;
      $v = \Validator::make($request->all(), [
            'nombres'   => 'required',
            'telefono'  => 'required',
            'carnet'    => 'required',
            'clave'     => 'required',
            'fecha_nacimiento'  => 'required',
            'fecha_inscripcion' => 'required',
            'cargo_id'  => 'required',
            'horario_id'=> 'required',
            'stand_id'  => 'required',
            'user_id'   => 'required'
        ]);
      if ( count($v->errors()) > 0 ){
            return response()->json(array("respuesta"=>"500_NO"));
      }else{
        $dato = new Persona;
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
            'nombres'   => 'required',
            'telefono'  => 'required',
            'carnet'    => 'required',
            'clave'     => 'required',
            'fecha_nacimiento'  => 'required',
            'fecha_inscripcion' => 'required',
            'cargo_id'  => 'required',
            'horario_id'=> 'required',
            'stand_id'  => 'required',
            'user_id'   => 'required'
        ]);
    if ( count($v->errors()) > 0 ){
          return response()->json(array("respuesta"=>"500_NO"));
    }else{
      $dato = Persona::find($id);
      $dato->fill( $request->all() );
      $dato->save();
      return response()->json(array("respuesta"=>"200_OK"));
    }
  }

  public function destroy($id){
    $dato = Persona::find($id);
    $dato->delete();
    return response()->json(array("respuesta"=>"200_OK"));
  }

}
