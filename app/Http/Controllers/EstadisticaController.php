<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;
use Carbon\Carbon;

class EstadisticaController extends Controller
{
  public function angular(){
    $horarios = \DB::table('horarios')->select('id', 'horario')->get();
    $stands   = \DB::table('stands')->select('id', 'nom_empresa')->get();
    $personas = \DB::table('personas')->select('id', 'nombres')->get();
    $datos = \DB::table('repetitivos')->select('fecha')->groupBy('fecha')->get();
    //return $horarios;
    return view('estadistica.index', compact('horarios', 'stands', 'personas', 'datos'));
  }

  public function index(){
    $datos = \DB::table('repetitivos')->orderBy('fecha')->get();
    return $datos;
  }

  public function show($id){
    $dato = Horario::find($id);
    return $dato;
  }

  public function dona($inicio, $fin, $horario, $persona){
    if( strlen($inicio) >5 && strlen($fin) ){
      if( is_numeric($horario) ){
        $horario = " horario_id = '".$horario."' ";
      }else {
        $horario = " ";
      }

      if( is_numeric($persona) ){
        $persona = " horario_id = '".$persona."' ";
      }else {
        $persona = " ";
      }

      $hombres = \DB::table('repetitivos')
                            ->whereRaw($persona)
                            ->whereRaw($persona)
                            ->where('fecha',   '>', Carbon::parse($inicio) )
                            ->orWhere('fecha', '=', Carbon::parse($inicio) )
                            ->where('fecha',   '<', Carbon::parse($fin) )
                            ->orWhere('fecha', '=', Carbon::parse($fin) )
      ->where('categoria', '=', 'hombres')->count();
      $mujeres = \DB::table('repetitivos')
                            ->whereRaw($persona)
                            ->whereRaw($persona)
                            ->where('fecha',   '>', Carbon::parse($inicio) )
                            ->orWhere('fecha', '=', Carbon::parse($inicio) )
                            ->where('fecha',   '<', Carbon::parse($fin) )
                            ->orWhere('fecha', '=', Carbon::parse($fin) )
      ->where('categoria', '=', 'mujeres')->count();
      $ninos = \DB::table('repetitivos')
                            ->whereRaw($persona)
                            ->whereRaw($persona)
                            ->where('fecha',   '>', Carbon::parse($inicio) )
                            ->orWhere('fecha', '=', Carbon::parse($inicio) )
                            ->where('fecha',   '<', Carbon::parse($fin) )
                            ->orWhere('fecha', '=', Carbon::parse($fin) )
      ->where('categoria', '=', 'niños')->count();
      $mayor = \DB::table('repetitivos')
                            ->whereRaw($persona)
                            ->whereRaw($persona)
                            ->where('fecha',   '>', Carbon::parse($inicio) )
                            ->orWhere('fecha', '=', Carbon::parse($inicio) )
                            ->where('fecha',   '<', Carbon::parse($fin) )
                            ->orWhere('fecha', '=', Carbon::parse($fin) )
      ->where('categoria', '=', 'mayor')->count();

      return json_encode(
              [[ "label"=>"Niños", "value"=>$ninos],
              [ "label"=>"Mujeres", "value"=>$mujeres],
              [ "label"=>"Varones", "value"=>$hombres],
              [ "label"=>"Adulto Mayor", "value"=>$mayor] ]
            );
    }
  }

}
