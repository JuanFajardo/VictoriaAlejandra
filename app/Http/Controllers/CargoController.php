<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;
use App\Cargo;

class CargoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    if( \Auth::guest() )
      return redirect('index.php/login');
    //elseif(\Auth::user()->grupo != '2' && \Auth::user()->grupo_id != 3 && \Auth::user()->grupo_id != 1)
    //  return abort(503);
  }

  public function angular(){
    return view('cargo.index');
  }

  public function index(){
    //$datos = Cargo::all();
    $datos = \DB::table('cargos')->join('horarios', 'cargos.horario_id', '=', 'horarios.id')
                                  ->where('cargos.deleted_at', '=', null)
                                  ->select('cargos.*', 'horarios.horario')->get();
    return $datos;
  }

  public function show($id){
    $dato = Cargo::find($id);
    return $dato;
  }

  public function store(Request $request){
    $request['user_id'] = 1;
    $dato = new Cargo;
    $dato->fill( $request->all() );
    $dato->save();

    return response()->json(array("respuesta"=>"200_OK"));
  }

  public function update(Request $request, $id){
    $request['user_id'] = 1;
    $dato = Cargo::find($id);
    $dato->fill( $request->all() );
    $dato->save();
    return response()->json(array("respuesta"=>"200_OK"));
  }

  public function destroy($id){
    $dato = Cargo::find($id);
    $dato->delete();
    return response()->json(array("respuesta"=>"200_OK"));
  }

}
