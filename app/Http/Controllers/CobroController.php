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

  public function vender(Request $request){
    //return $request->all();
    $stand = \DB::table('stands')->where('nom_empresa', '=', $request->empresa)->get();

    $empresa = $empresa_id = "";
    if( count($stand) > 0){
      $stand      = $stand[0];
      $empresa_id = $stand->id;
      $empresa    = $stand->nom_empresa;
    }else{
      $stand = new \App\Stand;
      $stand->nom_empresa   = $request->empresa;
      $stand->descripcion   = $request->empresa;
      $stand->cant_personal = '3';
      $stand->encargado     = $request->nombre;
      $stand->telefono      = $request->telefono;
      $stand->direccion     = 'SN';
      $stand->user_id       = \Auth::user()->id;
      $stand->logo          = ' ';
      $stand->save();
      $empresa_id = \DB::table('stands')->max('id');
    }

    $datos = explode(',', $request->ventas);
    for($i=0; $i<$request->numero; $i++){
      $columnas = explode('|', $datos[$i]);
      $puesto = \App\Puesto::find($columnas[0]);

      $cobro = new Cobro;
      $cobro->empresa     = $empresa;
      $cobro->encargado   = $request->nombre;
      $cobro->telefono    = $request->telefono;
      $cobro->monto       = $request->precio2 === null ? $request->precio1 : $request->precio2;
      $cobro->fecha       = date('Y-m-d');
      $cobro->puesto_id   = $puesto->id;
      $cobro->precio_id   = $puesto->costo_id;
      $cobro->stand_id    = $empresa_id;
      $cobro->user_id     = \Auth::user()->id;
      $cobro->save();

      $puesto->estado   = 'V';
      $puesto->user_id  = \Auth::user()->id;
      $puesto->save();
    }
    return redirect('Cobro/Piso/'.$request->planta);
  }

  public function piso($id){
    $direccion = "";
    $pagina = $id;
    if($id == '1'){
      $direccion = 'cobro.pisoa';
    }elseif($id == '2'){
      $direccion = 'cobro.pisob';
    }elseif($id == '3'){
      $direccion = 'cobro.pisoc';
    }elseif($id == '4'){
      $direccion = 'cobro.pisod';
    }elseif($id == '5'){
      $direccion = 'cobro.pisoe';
    }else{
      $direccion = 'cobro.pisoa';
      $pagina = '1';
    }
    return view( $direccion, compact('pagina'));
  }

  public function reserva( $id ){
    $datos = explode('-', $id);
    $puesto = $datos[0];
    $pagina = $datos[1];
    $user = \Auth::user()->id;
    $valido = \DB::table('puestos')->where('id', '=', $puesto)->where('user_id', '=', '1')->get();
    if( count($valido) > 0 ){
      $dato = \App\Puesto::find($puesto);
      $dato->estado   = 'R';
      $dato->user_id  = $user;
      $dato->save();
    }else{
      echo "<script> alert('Este puesto ya esta reservado'); <script>";
    }
    return redirect('Cobro/Piso/'.$pagina);
  }

  public function eliminar($id){
    $datos = explode('-', $id);
    $puesto = $datos[0];
    $pagina = $datos[1];
    $user = \Auth::user()->id;
    $dato = \App\Puesto::find($puesto);
    if($dato->estado != 'V'){
      \DB::table('puestos')->where('id', '=', $puesto)->where('user_id', '=', $user)
    	->update(['estado' => 'N', 'user_id'=>'1']);
    }
    return redirect('Cobro/Piso/'.$pagina);
  }

  public function reporte($id){
    $usuarios = \DB::table('users')->select('id', 'username')->get();
    $stands   = \DB::table('stands')->select('id', 'nom_empresa')->get();
    $datos    = \DB::table('cobros')->join('puestos', 'cobros.puesto_id', '=', 'puestos.id')
                                    ->join('costos', 'cobros.precio_id', '=', 'costos.id')
                                    ->join('users', 'cobros.user_id', '=', 'users.id')
                                    ->where('cobros.user_id', '=', \Auth::user()->id )
                                    ->select(
                                      'cobros.*', 'puestos.id as puestoId', 'puestos.dimension', 'puestos.tipo',
                                      'costos.precio', 'users.username'
                                    )->get();
                                    //return $datos;
    return view('cobro.reporte', compact('usuarios', 'stands', 'datos'));
  }


}
