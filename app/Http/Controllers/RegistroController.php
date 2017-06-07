<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Registro;

class RegistroController extends Controller
{


  public function angularfid(){
    return view('registro.registro');
  }

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
        $hora   = date('H');
        $minuto = date('i');
        $fecha  = date('Y-m-d');

        $tarjeta  = \DB::table('personas')->join('horarios', 'personas.horario_id',  '=', 'horarios.id')
                                          ->join('stands', 'personas.stand_id',  '=', 'stands.id')
                                          ->select('horarios.*', 'personas.*', 'horarios.id as horarioId', 'personas.id as personaID' , 'stands.nom_empresa' )
                                          ->where('tarjeta', '=', $id)->get();
        $id="";
        if( count($tarjeta) > 0) {

          $dato = explode(":", $tarjeta[0]->ingreso_am);
          $IngresoAmHora = $dato[0];
          $IngresoAmMinuto = $dato[1] + $tarjeta[0]->tolerancia;
          $dato = explode(":", $tarjeta[0]->salida_am);
          $SalidaAmHora = $dato[0];
          $dato = explode(":", $tarjeta[0]->ingreso_pm);
          $IngresoPmHora = $dato[0];
          $IngresoPmMinuto = $dato[1] + $tarjeta[0]->tolerancia;
          $dato = explode(":", $tarjeta[0]->salida_pm);
          $SalidaPmHora = $dato[0];

          $persona = $tarjeta[0]->personaID;
          $horario = $tarjeta[0]->horarioId;
          $contador  = \DB::table('registros')->where('fecha', '=', $fecha)
                                              ->where('persona_id', '=', $persona)
                                              ->where('horario_id', '=', $horario)
                                              ->get();
          $respuesta = $tarjeta;
          if(count($contador) == 0){
              $dato = new Registro;
              $dato->fecha      = $fecha;
              $dato->ingreso_am = $hora == $IngresoAmHora || ($hora-1) == $IngresoAmHora || ($hora+1) == $IngresoAmHora  ? date('H:i:s') : '00:00:00';
              $dato->salida_am  = $hora == $SalidaAmHora  || ($hora-1) == $SalidaAmHora  || ($hora+1) == $SalidaAmHora  ? date('H:i:s') : '00:00:00';
              $dato->ingreso_pm = $hora == $IngresoPmHora || ($hora-1) == $IngresoPmHora || ($hora+1) == $IngresoPmHora  ? date('H:i:s') : '00:00:00';
              $dato->salida_pm  = $hora == $SalidaPmHora  || ($hora-1) == $SalidaPmHora  || ($hora+1) == $SalidaPmHora  ? date('H:i:s') : '00:00:00';
              $dato->justificacion='';
              $dato->retraso_am = '0';
              $dato->retraso_pm = '0';
              $dato->persona_id = $persona;
              $dato->horario_id = $horario;
              $dato->user_id    = 1;//\Auth::user()->id;
              $dato->save();
          }else{
            $id = $contador[0]->id;

            if($SalidaAmHora == $hora || $SalidaAmHora == (1-$hora) || $SalidaAmHora == (1+$hora) ){
              $dato = Registro::find($id);
              $dato->salida_am  = date('H:i:s');
              $dato->save();
            }elseif ($SalidaPmHora == $hora || $SalidaPmHora == (1-$hora) || $SalidaPmHora == (1+$hora) ){
              $dato = Registro::find($id);
              $dato->salida_pm  = date('H:i:s');
              $dato->save();
            }elseif ($IngresoPmHora == $hora || $IngresoPmHora == (1-$hora) || $IngresoPmHora == (1+$hora) ){
              $dato = Registro::find($id);
              $dato->ingreso_am  = date('H:i:s');
              $dato->save();
            }elseif ($IngresoAmHora == $hora || $IngresoAmHora == (1-$hora) || $IngresoAmHora == (1+$hora) ){
              $dato->ingreso_pm  = date('H:i:s');
            }else{
              $respuesta = array("respuesta"=>"500_MAL", "msj"=>"REGISTRO FUERA DE HORARIO");
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
