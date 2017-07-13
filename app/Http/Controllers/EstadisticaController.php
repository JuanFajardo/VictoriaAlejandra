<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;

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
}
