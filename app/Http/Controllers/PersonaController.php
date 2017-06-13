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
    $datos = \DB::table('personas')->join('horarios', 'personas.horario_id', '=', 'horarios.id')
    ->select(
      'personas.id', 'personas.nombres', 'personas.direccion', 'personas.telefono', 'personas.carnet', 'personas.tarjeta', 'personas.estado_civil', 'personas.profesion', 'personas.genero',
      'personas.clave',  'personas.fecha_nacimiento', 'personas.fecha_inscripcion', 'personas.horario_id', 'personas.stand_id', 'personas.user_id','horarios.horario' )->get();

    return $datos;
  }

  public function show($id){
    $dato = Persona::find($id);
    return $dato;
  }

  public function store(Request $request){
    //return $request->all();
    try {
      $request['user_id'] = 1;
      $v = \Validator::make($request->all(), [
            'nombres'   => 'required',
            'telefono'  => 'required',
            'carnet'    => 'required',
            'clave'     => 'required',
            'fecha_nacimiento'  => 'required',
            'fecha_inscripcion' => 'required',
            'horario_id'=> 'required',
            'stand_id'  => 'required',
            'user_id'   => 'required'
        ]);
      if ( count($v->errors()) > 0 ){
            return response()->json(array("respuesta"=>"500_NO", "error"=>$v->errors()));
      }else{
        $stand = \DB::table('stands')->where('id', '=', $request->stand_id)->get();
        $personas  = \DB::table('personas')->where('stand_id', '=', $request->stand_id)->count();
        if($stand[0]->cant_personal >= $personas){
          $msj = "Aun tiene cupo ";
          $respuesta = "200_OK";
          $dato = new Persona;
          $dato->fill( $request->all() );
          $dato->save();
          $respuesta = "500_OK";
        }else{
          $msj = "No ay cupo";
        }
        return response()->json(array("respuesta"=>"200_OK", "msj"=>$msj));
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
