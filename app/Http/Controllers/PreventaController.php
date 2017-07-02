<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Preventa;
use App\Persona;
use ReCaptcha\ReCaptcha;
class PreventaController extends Controller
{
  public function angular(){
    return view('preventa.index');
  }
  public function angularlistar(){
    return view('preventa.listar');
  }

  public function index(){
    // $datos = Preventa::all()->where('reserva','=','0');
    $datos = \DB::table('preventa')->select('id', 'nombres', 'apellidos', 'correo',  'carnet',
       'fecha_nacimiento', 'telefono', 'genero','imagen','tarjeta','reserva' )
       ->where('reserva','=','0')->get();

    return $datos;
  }

  public function show($id){
    $dato = Preventa::find($id);
    return $dato;
  }
  public function captchaCheck()
  {

      $response = Input::get('g-recaptcha-response');
      $remoteip = $_SERVER['REMOTE_ADDR'];
      $secret   = env('NOCAPTCHA_SECRET');

      $recaptcha = new ReCaptcha($secret);
      $resp = $recaptcha->verify($response, $remoteip);
      if ($resp->isSuccess()) {
          return 1;
      } else {
          return 0;
      }
  }
  public function store(Request $request){
     $request['captcha'] = $this->captchaCheck();
    try {
      $v = \Validator::make($request->all(), [
            'nombres'    => 'required',
            'apellidos'    => 'required',
            'correo'    => 'required',
            'carnet'    => 'required|numeric',

            'telefono'    => 'required|numeric',
            'genero'    =>  'required',
            'g-recaptcha-response'  => 'required',
                'recaptcha'               => 'required|min:1'
        ]);
      if ( count($v->errors()) > 0 ){
            return response()->json(array("respuesta"=>$v->errors()));
      }else{
        $request['reserva'] = 0;
        $request['imagen'] = "";
        $request['fecha_nacimiento'] = date('Y-m-d', strtotime($request->fecha_nacimiento));
        $dato = new Preventa;
        $dato->fill( $request->all() );
        $dato->save();
        return response()->json(array("respuesta"=>"200_OK"));
      }
    } catch (Exception $e) {
      return "MensajeError -> ".$e->getMessage();
    }

  }
  public function update(Request $request, $id){
    try {

          $request['reserva'] = 1;
          $dato = Preventa::find($id);
          $dato->fill( $request->all() );
          $dato->save();
          \DB::table('personas')->insert([
            'nombres' => $request->nombres.' '.$request->apellidos,
            'direccion' => 'NaN',
            'telefono' => $request->telefono,
            'carnet' => $request->carnet,
            'tarjeta' => $request->tarjeta,
            'estado_civil' => 'NaN',
            'profesion' => 'NaN',
            'genero' => $request->genero,
             'clave' => $request->carnet,
             'reserva' => 'SI',
             'encargado' => 'NO',
             'imagen' => $request->imagen,
             'fecha_nacimiento' => $request->fecha_nacimiento,
             'fecha_inscripcion' => date('Y-m-d'),
             'horario_id' => '20',
             'stand_id' => '20',
             'user_id' => '1'
          ]);
          return response()->json(array("respuesta"=>"200_OK"));
    } catch (Exception $e) {
      return "MensajeError -> ".$e->getMessage();
    }

  }

  public function destroy($id){
  }

}
