<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
class LogController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    if( \Auth::guest() )
      return redirect('index.php/login');
    //elseif(\Auth::user()->grupo != '2' && \Auth::user()->grupo_id != 3 && \Auth::user()->grupo_id != 1)
    //  return abort(503);
  }

  public function angular(){
    return view('log.index');
  }

  public function index(){
    $datos = Log::all();
    return $datos;
  }

  public function show($id){
    $dato = Log::find($id);
    return $dato;
  }

  public function store(Request $request){
    $request['user_id'] = 1;
    $dato = new Log;
    $dato->fill( $request->all() );
    $dato->save();

    return response()->json(array("respuesta"=>"200_OK"));
  }

  public function update(Request $request, $id){
    $request['user_id'] = 1;
    $dato = Log::find($id);
    $dato->fill( $request->all() );
    $dato->save();
    return response()->json(array("respuesta"=>"200_OK"));
  }

  public function destroy($id){
    $dato = Log::find($id);
    $dato->delete();
    return response()->json(array("respuesta"=>"200_OK"));
  }

}
