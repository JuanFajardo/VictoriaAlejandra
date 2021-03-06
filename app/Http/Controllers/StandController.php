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
    $datos = Stand::select(
      'id', 'nom_empresa', 'generar_personal', 'cant_personal', 'descripcion', 'encargado', 'direccion', 'telefono', 'user_id'
    )->get();
    return $datos;
  }

  public function show($id){
    $dato = Stand::find($id);
    return $dato;
  }

  public function create(Request $request){
    return view('Stand.create');
  }
  public function store(Request $request){
    try {
      $request['user_id'] = 1;
      $v = \Validator::make($request->all(), [
            'nom_empresa'    => 'required',
            'cant_personal'    => 'required',
            'descripcion'    => 'required',
            'encargado'    => 'required',
            'direccion'    => 'required',
            'telefono'    => 'required',
            'user_id' => 'required'
        ]);
      if ( count($v->errors()) > 0 ){
            $respuesta = array("respuesta"=>"500_NO");
      }else{
        //return $request->all();
        $dato = new Stand;
        $dato->nom_empresa  = $request->nom_empresa;
        $dato->cant_personal= $request->cant_personal;
        $dato->descripcion  = $request->descripcion;
        $dato->encargado    = $request->encargado;
        $dato->direccion    = $request->direccion;
        $dato->telefono     = $request->telefono;
        $dato->logo         = $request->logo;
        $dato->user_id      = $request->user_id;
        //$dato->fill( $request->all() );
        $dato->save();

        $respuesta = array("respuesta"=>"200_OK");
      }
      return response()->json($respuesta);
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
        //'cant_per_reg'    => 'required',
        'descripcion'    => 'required',
        'encargado'    => 'required',
        'direccion'    => 'required',
        'telefono'    => 'required',
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

  public function persona($id){
    $dato = Stand::find($id);
    $numero     = $dato->cant_personal;
    $idStand    = $dato->id;
    $nombre     = $dato->nom_empresa;
    $direccion  = $dato->direccion;
    $telefono   = $dato->telefono;
    $imagen     = $dato->logo;

    $stand = Stand::find($id);
    $stand->generar_personal = 1;
    $stand->save();

    for($i=1; $i<=$numero; $i++){
      $persona = new \App\Persona;
      $persona->nombres   = $nombre;
      $persona->direccion = $direccion;
      $persona->telefono  = $telefono;
      $persona->carnet    = '123';
      $persona->tarjeta   = $idStand."-".date('ydhi')."-".$i;
      $persona->profesion = 'N';
      $persona->genero    = 'N';
      $persona->clave     = 'FEIPOBOL2018';
      $persona->encargado = 'NO';
      $persona->imagen    = $imagen;
      $persona->stand_id  = $idStand;
      $persona->user_id   = \Auth::user()->id;
      $persona->save();
    }
    return redirect('Stand#/lista');
  }

}
