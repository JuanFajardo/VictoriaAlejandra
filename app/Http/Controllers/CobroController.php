<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cobro;
class CobroController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    if( \Auth::guest() )
      return redirect('index.php/login');
    //elseif(\Auth::user()->grupo != '2' && \Auth::user()->grupo_id != 3 && \Auth::user()->grupo_id != 1)
    //  return abort(503);
  }

  public function angular(){
    return view('cobro.index');
  }

  public function index(){
    $datos = Cobro::all();
    return $datos;
  }

  public function show($id){
    $dato = Cobro::find($id);
    return $dato;
  }

  public function store(Request $request){
    $request['user_id'] = 1;
    $dato = new Cobro;
    $dato->fill( $request->all() );
    $dato->save();

    return response()->json(array("respuesta"=>"200_OK"));
  }

  public function update(Request $request, $id){
    $request['user_id'] = 1;
    $dato = Cobro::find($id);
    $dato->fill( $request->all() );
    $dato->save();
    return response()->json(array("respuesta"=>"200_OK"));
  }

  public function destroy($id){
    $dato = Cobro::find($id);
    $dato->delete();
    return response()->json(array("respuesta"=>"200_OK"));
  }

  public function piso($id){
    return view('cobro.pisoa');
  }

}
