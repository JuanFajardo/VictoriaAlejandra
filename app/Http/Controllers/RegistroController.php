<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Registro;
use App\Repetitivo;

class RegistroController extends Controller
{
  public function angularfid(){
    return view('registro.registro');
  }

  public function angular(){
    return view('registro.index');
  }

  public function index(){
    //['id', 'fecha', 'ingreso', 'salida', 'tarjeta', 'persona_id', 'stand_id', 'user_id'];
    $datos = \DB::table('registros')->join('stands', 'registros.stand_id', '=', 'stands.id')
                                    ->join('personas', 'registros.persona_id', '=', 'personas.id')
                                    ->join('users', 'registros.user_id', '=', 'users.id')
                                    ->select('registros.*', 'users.username',
                                    'stands.nom_empresa', 'stands.cant_personal',
                                    'personas.nombres', 'personas.tarjeta' )->get();
    return $datos;
  }

  public function show($id){
    $dato = \DB::table('registros')->join('personas', 'registros.persona_id', '=', 'personas.id')
                                  ->where('personas.id', '=', $id)
                                  ->select('registros.*')
                                  ->get();
    return $dato;
  }

  public function showPersona($id){
    $dato = \DB::table('personas')->join('horarios', 'personas.horario_id', '=', 'horarios.id')
                                 ->join('stands', 'personas.horario_id', '=', 'stands.id')
                                 ->select('personas.*', 'horarios.horario', 'stands.nom_empresa')
                                  ->where('personas.id', '=', $id)
                                  ->get();
    return $dato;
  }

  public function store(Request $request){
  }

  public function showTarjeta($id){
    try {
        $stand = (explode('-', $id))[0];
        $datos = \DB::table('personas')->where('tarjeta', '=', $id)->get();
        //$persona = \App\Persona::find($datos[0]->id);
        $persona = \DB::table('personas')->join('stands', 'personas.stand_id', '=', 'stands.id')
                                         ->where('personas.id', '=', $datos[0]->id)
                                         ->select('personas.*', 'stands.nom_empresa')->get();
        $persona = $persona[0];
        $fecha = date('Y-m-d');
        if( ( count($datos) > 0 ) ){
          $marcado = \DB::table('registros')->where('registros.tarjeta', '=', $id)->where('fecha', '=', $fecha)->get();
          if( count($marcado) > 4 ){
            $respuesta = array("respuesta"=>"500_MAL", "msj"=>"La Tarjeta ya ingreso y salio varias veces.");
          }elseif( ( count($marcado) == 0 ) ){
            $dato = new Registro;
            $dato->fecha      = $fecha;
            $dato->ingreso    = date('H:i:s');
            $dato->salida     = '00:00:00';
            $dato->tarjeta    = $id;
            $dato->persona_id = $persona->id;
            $dato->stand_id   = $stand;
            $dato->user_id    = \Auth::user()->id;
            $dato->save();
            $respuesta = $persona;
          }else{
            $salida = \DB::table('registros')->where('registros.tarjeta', '=', $id)->where('fecha', '=', $fecha)->where('salida', '=', '00:00:00')->get();
            if( count($salida) > 0 and count($salida) < 4 ){
              $dato = Registro::find($salida[0]->id);
              $dato->salida     = date('H:i:s');
              $dato->save();
              $respuesta = array("respuesta"=>"500_MAL", "msj"=> strtoupper($persona->nombres)." - INGRESO A ".$marcado[0]->ingreso." y sale ah ".date('H:i:s'));
            }elseif( count($salida) == 0 and count($salida) < 4 ){
              $dato = new Registro;
              $dato->fecha      = $fecha;
              $dato->ingreso    = date('H:i:s');
              $dato->salida     = '00:00:00';
              $dato->tarjeta    = $id;
              $dato->persona_id = $persona->id;
              $dato->stand_id   = $stand;
              $dato->user_id    = \Auth::user()->id;
              $dato->save();
              $respuesta = $persona;
            }else{
              $respuesta = array("respuesta"=>"500_MAL", "msj"=>"La Tarjeta ya ingreso y salio varias veces.");
            }
          }
        }else {
          $respuesta = array("respuesta"=>"500_MAL", "msj"=>"Tarjeta NO VALIDA");
        }
        return response()->json($respuesta);
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
      $dato = Registro::find($id);
      $dato->fill( $request->all() );
      $dato->save();
      return response()->json(array("respuesta"=>"200_OK"));
    }
  }

  public function destroy($id){
    $dato = Registro::find($id);
    $dato->delete();
    return response()->json(array("respuesta"=>"200_OK"));
  }

}
