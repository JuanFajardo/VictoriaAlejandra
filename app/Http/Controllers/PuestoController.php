<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Puesto;
class PuestoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    if( \Auth::guest() )
      return redirect('index.php/login');
    //elseif(\Auth::user()->grupo != '2' && \Auth::user()->grupo_id != 3 && \Auth::user()->grupo_id != 1)
    //  return abort(503);
  }

  public function angular(){
    return view('puesto.index');
  }

  public function index(){
    //$datos = Puesto::all();
    $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                  ->join('nivels', 'puestos.nivel_id', '=', 'nivels.id')
                                  ->select('puestos.*', 'costos.precio', 'nivels.piso')
                                  ->get();
    return $datos;
  }

  public function show($id){
    $dato = Puesto::find($id);
    return $dato;
  }

  public function store(Request $request){
    $request['user_id'] = 1;
    $request['estado'] = 'N';
    $dato = new Puesto;
    $dato->fill( $request->all() );
    $dato->save();

    return response()->json(array("respuesta"=>"200_OK"));
  }

  public function update(Request $request, $id){
    $request['user_id'] = 1;
    $dato = Puesto::find($id);
    $dato->fill( $request->all() );
    $dato->save();

    return response()->json(array("respuesta"=>"200_OK"));
  }

  public function destroy($id){
    $dato = Puesto::find($id);
    $dato->delete();

    return response()->json(array("respuesta"=>"200_OK"));
  }

}
