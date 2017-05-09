<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stand;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;
class StandController extends Controller
{
  public function angular(){
    return view('stand.index');
  }

  public function index(){
    $datos = Stand::all();
    return $datos;
  }

  public function show($id){
    $dato = Stand::find($id);
    return $dato;
  }

  public function store(Request $request){
    try {
      $request['user_id'] = 1;
      $v = \Validator::make($request->all(), [
            'nom_empresa'    => 'required',
            'cant_personal'    => 'required',
            'cant_per_reg'    => 'required',
            'descripcion'    => 'required',
            'encargado'    => 'required',
            'direccion'    => 'required',
            'telefono'    => 'required',
            'user_id' => 'required'
        ]);
      if ( count($v->errors()) > 0 ){
            return response()->json(array("respuesta"=>"500_NO"));
      }else{
        $imagen = Input::file('imagen');
        $filename = $imagen->getClientOriginalName();
        return response()->json(array("respuesta"=>"$imagen"));
        $request['logo'] = $nombre;

        $dato = new Stand;
        $dato->fill( $request->all() );
        $dato->save();
        //return response()->json(array("respuesta"=>"200_OK"));
      }
    } catch (Exception $e) {
      return "MensajeError -> ".$e->getMessage();
    }

  }

  public function update(Request $request, $id){
    $request['user_id'] = 1;
    //$request['cant_per_reg'] = 0;
    $v = \Validator::make($request->all(), [
        'nom_empresa'    => 'required',
        'cant_personal'    => 'required',
        'cant_per_reg'    => 'required',
        'descripcion'    => 'required',
        'encargado'    => 'required',
        'direccion'    => 'required',
        'telefono'    => 'required',
        'logo'    => 'required',
        'user_id' => 'required'
      ]);
    if ( count($v->errors()) > 0 ){
          return response()->json(array("respuesta"=>"500_NO"));
    }else{
      $dato = Stand::find($id);
      $dato->fill( $request->all() );
      $dato->save();
      return response()->json(array("respuesta"=>"200_OK"));
    }
  }

  public function destroy($id){
    $dato = Stand::find($id);
    $dato->delete();
    return response()->json(array("respuesta"=>"200_OK"));
  }

}
