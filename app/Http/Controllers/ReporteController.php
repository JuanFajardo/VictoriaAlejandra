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

        $persona    = explode(' ', $request->horario);
        $fecha_fin    = $request->fecha_fin;
        $fecha_inicio = $request->fecha_inicio;
        $datos = \DB::table('personas')->select('nombres', 'carnet',
           'fecha_inscripcion', 'horario_id', 'stand_id')
           ->where([['fecha_inscripcion','>=','$fecha_inicio'],
           ['fecha_inscripcion','<=','$fecha_fin'],
           ['horario_id','=',"'".$persona[0]."'"],])->get();
        // $datos2 = \DB::table('horarios')->select('horario')
        //     ->where('id','=',"'".$datos['horario_id']."'")->get();
        // $datos['horario_id']=$datos2['horario'];
        //
        //  $datos3 = \DB::table('stands')->select('nom_empresa')
        //      ->where('id','=',"'".$datos['stadn_id']."'")->get();
        // $datos['stand_id']`=$datos3['nom_empresa'];
        //   $sqlPersona = " and  '".$persona[0]."' ";
        // }else {
        //   $sqlPersona = "";
        // }
        // if( isset($request->horario)){
        //   $horario    = explode(' ', $request->horario);
        //   $sqlHorario = "and '".$horario[0]."' ";
        // }else {
        //   $sqlHorario = " ";
        // }
        // if( isset($request->stand) ){
        //   $stand      = explode(' ', $request->stand);
        //   $sqlStand = "and '".$stand[0]."' ";
        // }else {
        //   $sqlStand = "";
        // }
        //
        // $datos = \DB::table('registros')->join('personas', 'registros.persona_id', '=', 'personas.id')
        //                                 ->whereRaw($sqlHorario)
        //                                ->select('registros.*', 'personas.nombres')
        //                                ->get();
        // return $datos;

        // $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('reporte.reporte', compact('datos', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('letter', 'landscape');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
  }
}
