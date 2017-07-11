<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;

class EstadisticaController extends Controller
{
  public function angular(){
    $horarios = \DB::table('horarios')->get();
    $stands   = \DB::table('stands')->get();
    $personas = \DB::table('personas')->get();
    return view('estadistica.index', compact('horarios', 'stands', 'personas'));
  }

  public function index(){
    $datos = Horario::all();
    return $datos;
  }

  public function show($id){
    $dato = Horario::find($id);
    return $dato;
  }
}
