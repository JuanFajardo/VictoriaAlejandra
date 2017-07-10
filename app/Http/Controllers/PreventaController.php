<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Preventa;
use App\Persona;
class PreventaController extends Controller
{
  public function angular(){
    return view('preventa.index');
  }
  public function angularlistar(){
    return view('preventa.listar');
  }

  public function index(){
    // $datos = Preventa::all()->where('reserva','=','0');
    $datos = \DB::table('preventa')->select('id', 'nombres', 'apellidos', 'correo',  'carnet',
       'fecha_nacimiento', 'telefono', 'genero','imagen','tarjeta','reserva','user_id' )->get();
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
            'genero'    =>  'required',
        ]);
      if ( count($v->errors()) > 0 ){
            return response()->json(array("respuesta"=>$v->errors()));
      }else{
        $request['reserva'] = 0;
        $request['imagen'] = "";
        $request['user_id'] = 0;
        $request['fecha_nacimiento'] = date('Y-m-d', strtotime($request->fecha_nacimiento));
        $dato = new Preventa;
        $dato->fill( $request->all() );
        $dato->save();
        return response()->json(array("respuesta"=>"200_OK"));
      }
    } catch (Exception $e) {
      return "MensajeError -> ".$e->getMessage();
    }

  }
  public function credito(Request $request, $id){
    try {
         $datos = \DB::table('credito')->select('id','cantidad')
         ->where('persona_id','=',$request->user_id)->get();
          $request->cantidad = $datos['cantidad'] + $request->cantidad;
         \DB::table('credito')->where('persona_id',$request->user_id)->update(['cantidad' => $request->cantidad]);
        return response()->json(array("respuesta"=>"200_OK"));
    } catch (Exception $e) {
      return "MensajeError -> ".$e->getMessage();
    }
  }
  public function update(Request $request, $id){
    try {

          $request['reserva'] = 1;
          $dato = Preventa::find($id);
          $dato->fill( $request->all() );
          $dato->save();
          $ids =\DB::table('personas')->insertGetId([
            'nombres' => $request->nombres.' '.$request->apellidos,
            'direccion' => 'NaN',
            'telefono' => $request->telefono,
            'carnet' => $request->carnet,
            'tarjeta' => $request->tarjeta,
            'estado_civil' => 'NaN',
            'profesion' => 'NaN',
            'genero' => $request->genero,
             'clave' => $request->carnet,
             'reserva' => 'SI',
             'encargado' => 'NO',
             'imagen' => $request->imagen,
             'fecha_nacimiento' => $request->fecha_nacimiento,
             'fecha_inscripcion' => date('Y-m-d'),
             'horario_id' => '20',
             'stand_id' => '20',
             'user_id' => '1'
          ]);
          \DB::table('preventa')->where('tarjeta',$request->tarjeta)->update(['user_id' => $ids]);
          \DB::table('credito')->insert([
            'cantidad' => $request->cantidad,
            'cod_tarjeta' => $request->tarjeta,
            'persona_id' => $id,
            'user_id' => '1'
          ]);
          return response()->json(array("respuesta"=>"200_OK"));
    } catch (Exception $e) {
      return "MensajeError -> ".$e->getMessage();
    }

  }

  public function destroy($id){
  }

}
