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
    ->select(
    'personas.id', 'personas.nombres', 'personas.direccion', 'personas.telefono', 'personas.carnet', 'personas.tarjeta', 'personas.estado_civil', 'personas.profesion', 'personas.genero',
    'personas.clave',  'personas.fecha_nacimiento', 'personas.fecha_inscripcion', 'personas.horario_id', 'personas.stand_id', 'personas.user_id','horarios.horario' )->get();

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
        $tiqueoHora = strtotime(date('H:i:s'));
        $fecha  = date('Y-m-d');

        $tarjeta  = \DB::table('personas')->join('horarios', 'personas.horario_id',  '=', 'horarios.id')
                                          ->join('stands', 'personas.stand_id',  '=', 'stands.id')
                                          ->select(
                                            'horarios.id as horarioId',
                                            'horarios.horario', 'horarios.ingreso_am', 'horarios.salida_am', 'horarios.ingreso_pm',
                                            'horarios.salida_pm', 'horarios.tolerancia', 'horarios.fijo',
                                            'personas.id as personaId', 'personas.nombres', 'personas.imagen',
                                            'stands.nom_empresa' )
                                          ->where('tarjeta', '=', $id)->get();
        $id="";
        if( count($tarjeta) > 0) {

          $ingresoAM = $tarjeta[0]->ingreso_am == '00:00:00' ? '00:00:00' : strtotime($tarjeta[0]->ingreso_am) + $tarjeta[0]->tolerancia;
          $salidaAM  = $tarjeta[0]->salida_am == '00:00:00' ? '00:00:00' : strtotime($tarjeta[0]->ingreso_pm);
          $ingresoPM = $tarjeta[0]->ingreso_pm == '00:00:00' ? '00:00:00' : strtotime($tarjeta[0]->ingreso_pm) + $tarjeta[0]->tolerancia;
          $salidaPM  = $tarjeta[0]->salida_pm == '00:00:00' ? '00:00:00' : strtotime($tarjeta[0]->salida_pm);

          if($tarjeta[0]->fijo == "NO" ){

          }else{
            $persona = $tarjeta[0]->personaId;
            $horario = $tarjeta[0]->horarioId;
            $contador= \DB::table('registros')->where('fecha', '=', $fecha)
                                              ->where('persona_id', '=', $persona)
                                              ->where('horario_id', '=', $horario)
                                              ->get();
            if(count($contador) == 0){
                $dato = new Registro;
                $dato->fecha      = $fecha;
                $dato->ingreso_am = '00:00:00';
                $dato->salida_am  = '00:00:00';
                $dato->ingreso_pm = '00:00:00';
                $dato->salida_pm  = '00:00:00';
                $dato->justificacion='';
                $dato->retraso_am = 0;
                $dato->retraso_pm = 0;
                $dato->persona_id = $persona;
                $dato->horario_id = $horario;
                $dato->user_id    = 1;//\Auth::user()->id;
                $dato->save();
            }

            $registro = \DB::table('registros')->where('fecha', '=', $fecha)
                                               ->where('persona_id', '=', $persona)
                                               ->where('horario_id', '=', $horario)
                                              ->get();

            

            $dato = Registro::find($registro[0]->id);
            $dato->retraso_am = ;
            $dato->retraso_pm = ;
            $dato->save();

            $respuesta = $tarjeta;
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
