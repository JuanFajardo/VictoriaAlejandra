<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Registro;

class RegistroController extends Controller
{

  public function angular(){
    return view('registro.index');
  }

  public function index(){
    //$datos = Persona::all();
    $datos = \DB::table('personas')->join('horarios', 'personas.horario_id', '=', 'horarios.id')
    ->select('personas.*', 'horarios.horario' )->get();

    return $datos;
  }

  public function show($id){
    $dato = \DB::table('registros')->join('personas', 'registros.persona_id', '=', 'personas.id')
                                  ->where('personas.id', '=', $id)
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
    //return $request->all();
    try {
        $hora   = date('H');
        $minuto = date('i');
        $fecha  = date('Y-m-d');
        $tarjeta  = \DB::table('personas')->join('horarios', 'personas.horario_id',  '=', 'horarios.id')
                                          ->select('horarios.*', 'personas.*', 'horarios.id as horarioId', 'personas.id as personaID' )
                                          ->where('tarjeta', '=', $request->tarjeta)->get();

        //$tarjeta = $tarjeta[0];

        $persona = $tarjeta[0]->personaID;
        $horario = $tarjeta[0]->horarioId;

        /*
        $contador  = \DB::table('registros')->where('fecha', '=', $fecha)
                                            ->where('persona_id', '=', $persona)
                                            ->where('horario_id', '=', $horario)
                                            ->get();
*/
  //      if(count($contador) == 0){
          if(count($tarjeta) == 0){
          $dato = new Registro;
          $dato->fecha      = $fecha;
          $dato->ingreso_am = date('H:i:s');
          $dato->salida_am  = '00:00:00';
          $dato->ingreso_pm = '00:00:00';
          $dato->salida_pm  = '00:00:00';
          $dato->justificacion='';
          $dato->retraso_am = '0';
          $dato->retraso_pm = '0';
          $dato->persona_id = $persona;
          $dato->horario_id = $horario;
          $dato->user_id    = 1;//\Auth::user()->id;
          $dato->save();
}/*
        }else{
          if()
          $contador = $contador[0];
          $dato = Registro::find($contador->id);
          $dato->ingreso_am = $am1;
          $dato->salida_am  = $am2;
          $dato->ingreso_pm = $pm1;
          $dato->salida_pm  = $pm1;
          $dato->retraso_am = $re1;
          $dato->retraso_pm = $re2;
          $dato->save();
        }*/

        if(count($tarjeta) > 0)
          return $tarjeta;
        else
          return response()->json(array("respuesta"=>"500_MAL", "msj"=>"Tarjeta NO VALIDA"));
    } catch (Exception $e) {
      return "MensajeError -> ".$e->getMessage();
    }

  }



  public function showTarjeta($id){
    //return $request->all();
    try {
        $hora   = date('H');
        $minuto = date('i');
        $fecha  = date('Y-m-d');
        $tarjeta  = \DB::table('personas')->join('horarios', 'personas.horario_id',  '=', 'horarios.id')
                                          ->select('horarios.*', 'personas.*', 'horarios.id as horarioId', 'personas.id as personaID' )
                                          ->where('tarjeta', '=', $id)->get();

        //$tarjeta = $tarjeta[0];

        $persona = $tarjeta[0]->personaID;
        $horario = $tarjeta[0]->horarioId;

        /*
        $contador  = \DB::table('registros')->where('fecha', '=', $fecha)
                                            ->where('persona_id', '=', $persona)
                                            ->where('horario_id', '=', $horario)
                                            ->get();
*/
  //      if(count($contador) == 0){
          if(count($tarjeta) == 0){
          $dato = new Registro;
          $dato->fecha      = $fecha;
          $dato->ingreso_am = date('H:i:s');
          $dato->salida_am  = '00:00:00';
          $dato->ingreso_pm = '00:00:00';
          $dato->salida_pm  = '00:00:00';
          $dato->justificacion='';
          $dato->retraso_am = '0';
          $dato->retraso_pm = '0';
          $dato->persona_id = $persona;
          $dato->horario_id = $horario;
          $dato->user_id    = 1;//\Auth::user()->id;
          $dato->save();
}/*
        }else{
          if()
          $contador = $contador[0];
          $dato = Registro::find($contador->id);
          $dato->ingreso_am = $am1;
          $dato->salida_am  = $am2;
          $dato->ingreso_pm = $pm1;
          $dato->salida_pm  = $pm1;
          $dato->retraso_am = $re1;
          $dato->retraso_pm = $re2;
          $dato->save();
        }*/

        if(count($tarjeta) > 0)
          return $tarjeta;
        else
          return response()->json(array("respuesta"=>"500_MAL", "msj"=>"Tarjeta NO VALIDA"));
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
