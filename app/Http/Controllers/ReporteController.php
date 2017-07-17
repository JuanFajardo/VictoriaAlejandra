<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reporte;

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
        //return $request->all();
        $horario = explode(' ', $request->horario);
        $stand = explode(' ', $request->stand);
        $persona = explode(' ', $request->persona);

        $fecha_fin = $request->fecha_fin;
        $fecha_fin = date_format( date_create($fecha_fin), 'Y-m-d' );
        $fecha_inicio = $request->fecha_inicio;
        $fecha_inicio = date_format( date_create($fecha_inicio), 'Y-m-d' );
        if(isset($request->horario) && !isset($request->stand) && !isset($request->persona)){
          $datos = \DB::table('registros')
            ->join('personas', 'registros.persona_id', '=', 'personas.id')
            ->join('horarios', 'registros.horario_id', '=', 'horarios.id')
            ->join('stands', 'personas.stand_id', '=', 'stands.id')
            ->select('personas.nombres as no','horarios.horario','stands.nom_empresa',
                     'registros.fecha','registros.ingreso_am','registros.salida_am',
                     'registros.ingreso_pm','registros.salida_pm','registros.retraso_am',
                     'registros.retraso_pm','registros.justificacion','registros.horario_id')
            ->where([
              ['registros.fecha','>',$fecha_inicio],
              ['registros.fecha','<',$fecha_fin],
              ['registros.horario_id','=',$horario[0]],
            ])
            ->orderBy('registros.fecha', 'desc')
            ->get();
        }
        else{
          if(!isset($request->horario) && !isset($request->stand) && isset($request->persona)){
            $datos = \DB::table('registros')
              ->join('personas', 'registros.persona_id', '=', 'personas.id')
              ->join('horarios', 'registros.horario_id', '=', 'horarios.id')
              ->join('stands', 'personas.stand_id', '=', 'stands.id')
              ->select('personas.nombres as no','horarios.horario','stands.nom_empresa',
                       'registros.fecha','registros.ingreso_am','registros.salida_am',
                       'registros.ingreso_pm','registros.salida_pm','registros.retraso_am',
                       'registros.retraso_pm','registros.justificacion','registros.horario_id')
              ->where([
                ['registros.fecha','>',$fecha_inicio],
                ['registros.fecha','<',$fecha_fin],
                ['registros.persona_id','=',$persona[0]],
              ])
              ->orderBy('registros.fecha', 'desc')
              ->get();
          }
          else{
            if(isset($request->horario) && !isset($request->stand) && isset($request->persona)){
              $datos = \DB::table('registros')
                ->join('personas', 'registros.persona_id', '=', 'personas.id')
                ->join('horarios', 'registros.horario_id', '=', 'horarios.id')
                ->join('stands', 'personas.stand_id', '=', 'stands.id')
                ->select('personas.nombres as no','horarios.horario','stands.nom_empresa',
                         'registros.fecha','registros.ingreso_am','registros.salida_am',
                         'registros.ingreso_pm','registros.salida_pm','registros.retraso_am',
                         'registros.retraso_pm','registros.justificacion','registros.horario_id')
                ->where([
                  ['registros.fecha','>',$fecha_inicio],
                  ['registros.fecha','<',$fecha_fin],
                  ['registros.persona_id','=',$persona[0]],
                  ['registros.horario_id','=',$horario[0]],
                ])
                ->orderBy('registros.fecha', 'desc')
                ->get();
            }
          }
        }
        $data = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('reporte.reporte', compact('datos', 'fecha_inicio','fecha_fin', 'horario', 'stand', 'personas'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('letter', 'landscape');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
  }
}
