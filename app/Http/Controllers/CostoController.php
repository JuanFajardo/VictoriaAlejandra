<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Costo;
class CostoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    if( \Auth::guest() )
      return redirect('index.php/login');
    //elseif(\Auth::user()->grupo != '2' && \Auth::user()->grupo_id != 3 && \Auth::user()->grupo_id != 1)
    //  return abort(503);
  }

  public function angular(){
    return view('costo.index');
  }

  public function index(){
    $datos = Costo::all();
    return $datos;
  }

  public function show($id){
    $dato = Costo::find($id);
    return $dato;
  }

  public function store(Request $request){
    $request['user_id'] = 1;
    $dato = new Costo;
    $dato->fill( $request->all() );
    $dato->save();

    return response()->json(array("respuesta"=>"200_OK"));
  }

  public function update(Request $request, $id){
    $request['user_id'] = 1;
    $dato = Costo::find($id);
    $dato->fill( $request->all() );
    $dato->save();
    return response()->json(array("respuesta"=>"200_OK"));
  }

  public function destroy($id){
    $dato = Costo::find($id);
    $dato->delete();
    return response()->json(array("respuesta"=>"200_OK"));
  }

}
