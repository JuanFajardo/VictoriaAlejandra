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
      /*
        $respuesta = "VictoriaAlejandra";
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
                                            'personas.id as personaId', 'personas.nombres', 'personas.genero', 'personas.fecha_nacimiento',  'personas.imagen',
                                            'stands.nom_empresa','stands.id as ids' )
                                          ->where('tarjeta', '=', $id)->get();
        $id="";
        if( count($tarjeta) > 0) {
          if($tarjeta[0]->ids ==20){
            $dat  = \BD::table('credito')->select('id','cantidad','gastado')
            ->where('persona_id','=',$tarjeta[0]->personaId)->get();
            $precioEntrada = 20; //Precio de entrada en Bs que se descontara
            $saldoActual = $dat->first()->cantidad - $precioEntrada;
            if($saldoActual<0){
              $respuesta = array("respuesta"=>"500_MAL", "msj"=>"Saldo Insuficiente");
            }
            else{
              $totalGastado = $dat->first()->gastado + $precioEntrada;
              \DB::table('credito')->where('persona_id',$tarjeta[0]->personaId)->update(['cantidad' => $saldoActual, 'gastado' => $totalGastado]);
              \DB::table('detalle_ventas')->insert([
                'persona_id' => $tarjeta[0]->personaId,
                'horarios_id' => '20',
                'asunto' => 'Entrada FEIPOBOL',
                'precio' => $precioEntrada,
                'cantidad' => '1',
                'total' => $precioEntrada,
                'fecha_registro' => date("Y-m-d"),
                'hora_registro' => time("HH-mm-ss"),
                'user_id' => '1'
              ]);
            }
          }
          else{
            $ingresoAM = $tarjeta[0]->ingreso_am == '00:00:00' ? '00:00:00' : strtotime($tarjeta[0]->ingreso_am) + $tarjeta[0]->tolerancia;
            $salidaAM  = $tarjeta[0]->salida_am == '00:00:00' ? '00:00:00' : strtotime($tarjeta[0]->ingreso_pm);
            $ingresoPM = $tarjeta[0]->ingreso_pm == '00:00:00' ? '00:00:00' : strtotime($tarjeta[0]->ingreso_pm) + $tarjeta[0]->tolerancia;
            $salidaPM  = $tarjeta[0]->salida_pm == '00:00:00' ? '00:00:00' : strtotime($tarjeta[0]->salida_pm);

            $persona = $tarjeta[0]->personaId;
            $horario = $tarjeta[0]->horarioId;

            if($tarjeta[0]->fijo == "NO" ){
              $cont  = \DB::table('repetitivos')->where('persona_id','=', $persona)
                                                  ->where('fecha',      '=', $fecha)
                                                  ->count();
              $ingreso = ( $cont % 2 == 0 ) ? 'INGRESO' : 'SALIDA';

              $edad = date('Y') - date('Y',  strtotime($tarjeta[0]->fecha_nacimiento));

              if( $edad > 0 && $edad < 12  )
                $categoria = "NIÑO";
              elseif ($edad >= 12 && $edad < 18  )
                $categoria = "ADOLECENTE";
              elseif ($edad >= 18 && $edad < 65  )
                $categoria = "ADULTO";
              elseif ($edad >= 18 && $edad < 65  )
                $categoria = "ADULTO MAYOR";

              $dato = new \App\Repetitivo;
              $dato->fecha      = $fecha;
              $dato->hora       = date('H:i:s');
              $dato->categoria  = $categoria;
              $dato->sexo       = $tarjeta[0]->genero;
              $dato->marcado    = $ingreso;
              $dato->persona_id = $persona;
              $dato->horario_id = $horario;
              $dato->user_id    = 1;//\Auth::user()->id;
              $dato->save();

              $respuesta = $tarjeta;
            }else{
              $contador= \DB::table('registros')->where('fecha=', $fecha)
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
              $dato->ingreso_am = $tiqueoHora;
              $dato->salida_am  = $tiqueoHora;
              $dato->ingreso_pm = $tiqueoHora;
              $dato->salida_pm  = $tiqueoHora;
              $dato->retraso_am = ($tiqueoHora - $registro[0]->ingreso_am );
              $dato->retraso_pm = ($tiqueoHora - $registro[0]->ingreso_pm );
              $dato->save();

              $respuesta = $tarjeta;
            }
          }
        }else {
            $respuesta = array("respuesta"=>"500_MAL", "msj"=>"Tarjeta NO VALIDA");
        }
        */

        $fecha    = date('Y-m-d');
        $persona  = \DB::table('personas')->join('horarios', 'personas.horario_id',  '=', 'horarios.id')
                                          ->join('stands', 'personas.stand_id',  '=', 'stands.id')
                                          ->where('personas.tarjeta', '=', $id)
                                          ->select(
                                            'horarios.id as horarioId',
                                            'horarios.horario', 'horarios.ingreso_am', 'horarios.salida_am', 'horarios.ingreso_pm',
                                            'horarios.salida_pm', 'horarios.tolerancia', 'horarios.fijo',
                                            'personas.id as personaId', 'personas.nombres', 'personas.genero', 'personas.fecha_nacimiento',  'personas.imagen',
                                            'stands.nom_empresa','stands.id as ids' )
                                          ->get();
        if(count($persona)>0  ){
          $personas = $persona;
          $persona = $persona[0];
          $repetitivo = \DB::table('repetitivos')->where('fecha', '=', $fecha)->where('persona_id', '=', $persona->personaId)->get();
          if( !count($repetitivo) > 0 ){

            $dato = new Repetitivo;
            $dato->fecha      = date('Y-m-d');
            $dato->hora       = date('H:i:s');
            $dato->categoria  = "hombres/muejres";
            $dato->sexo       = "NaN";
            $dato->marcado    = "ingreso";
            $dato->persona_id = $persona->personaId;
            $dato->horario_id = $persona->horarioId;
            $dato->stand_id   = $persona->ids;
            $dato->user_id    = \Auth::user()->id;
            $dato->save();
            /*
            $respuesta = array(
              "respuesta" => "200_OK",
              "nombres"   => $persona->nombres,
              "horario"   => $persona->horario,
              "nom_empresa"=> $persona->nom_empresa,
              "imagen"    => $persona->imagen
            );*/
            $respuesta = $personas;
          }else{
            $repetitivo = $repetitivo[0];
            $respuesta = array("respuesta"=>"500_MAL", "msj"=> strtoupper($persona->nombres)." USUARIO YA INGRESO A HRAS. ".$repetitivo->hora);
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
