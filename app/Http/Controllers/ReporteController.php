<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reporte;
use App\Registro;
use Carbon\Carbon;

class ReporteController extends Controller
{
  public function angular(){
    $horarios = \DB::table('horarios')->select('id', 'horario')->get();
    $stands = \DB::table('stands')->select('id', 'descripcion')->get();
    $personas = \DB::table('personas')->select('id', 'nombres')->get();
    return view('reporte.index', compact('horarios','stands','personas') );
  }

  public function index(){
  }


  public function store(Request $request){
        //$stand = explode(' ', $request->stand);
        $fecha_inicio = date('Y-m-d', strtotime($request->fecha_inicio)); //date_format( date_create($fecha_inicio), 'Y-m-d' );
        $fecha_fin = date('Y-m-d', strtotime($request->fecha_fin)); //date_format( date_create($fecha_fin), 'Y-m-d' );
        //return $fecha_inicio . " *** ". $fecha_fin;
        if( isset($request->horario) ){
          $horario = explode(' ', $request->horario);
          $horario = $horario[0];
          $horario = " registros.horario_id = '".$horario."' ";
        }else{
          $horario = " ";
        }
        if( isset($request->persona) ){
          $persona = explode(' ', $request->persona);
          $persona = $persona[0];
          $persona = " registros.persona_id = '".$request->persona."' ";
        }else{
          $persona = " ";
        }

        //return $persona . " *** ". $horario;
        $datos = \DB::table('registros')
          ->join('personas', 'registros.persona_id', '=', 'personas.id')
          ->join('horarios', 'registros.horario_id', '=', 'horarios.id')
          //->join('stands', 'personas.stand_id', '=', 'stands.id')
          //->whereRaw($persona)
          //->whereRaw($horario)
          ->where('registros.fecha',   '>', Carbon::parse($fecha_inicio) )
          ->orWhere('registros.fecha', '=', Carbon::parse($fecha_inicio) )
          ->where('registros.fecha',   '<', Carbon::parse($fecha_fin) )
          ->orWhere('registros.fecha', '=', Carbon::parse($fecha_fin) )

          ->select('personas.nombres as no','horarios.horario', //'stands.nom_empresa',
                   'registros.fecha','registros.ingreso_am','registros.salida_am',
                   'registros.ingreso_pm','registros.salida_pm','registros.retraso_am',
                   'registros.retraso_pm','registros.justificacion','registros.horario_id')
          ->orderBy('registros.fecha', 'desc')->get();

        $data = date('Y-m-d');
        $invoice = "Ing.Informatica";
        $view =  \View::make('reporte.reporte', compact('datos', 'fecha_inicio','fecha_fin', 'horario', 'stand', 'personas'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('letter', 'landscape');
        $pdf->loadHTML($view);
        return $pdf->stream('UATF-Reporte');
  }
}
