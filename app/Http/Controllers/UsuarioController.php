<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsuarioController extends Controller
{
  public function __construct(){
    $this->middleware('auth');

    if( \Auth::guest() )
      return redirect('index.php/login');
    //elseif(\Auth::user()->grupo_id != 2 && \Auth::user()->grupo_id != 3 && \Auth::user()->grupo_id != 1)
    //  return abort(503);
  }

  public function index(){
        $usuarios = User::all();
        return view('auth.lista')->with('usuarios', $usuarios);
  }

  public function showRegistrationForm(){
      return view('auth.register');
  }

  protected function validator(array $data)
  {
      return Validator::make($data, [
          'name' => 'required|max:255',
          'username' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|confirmed|min:3',
          'grupo' => 'required|max:255',
          'estado'=> 'required|max:255',
      ]);
  }

  protected function create(Request $data)
  {
      $estado = false;
      if($data['estado'] == 'on'){
          $estado = true;
      }
      User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
          'grupo' => $data['grupo'],
          'estado'=> $estado,
      ]);
      return redirect('/usuarios');
  }

  public function edit($id){
    $user = User::find($id);
    return view('auth.editar', compact('user'));
  }

  public function update(Request $request, $id){
    //return $request->all();
    $user = User::find($id);
    $estado = false;
    if($request->input('estado') == 'on'){
        $estado = true;
    }
    $user->name       = $request->input('username');
    $user->name       = $request->input('name');
    $user->email      = $request->input('email');
    if( strlen($request->input('password')) > 0 )
      $user->password = bcrypt($request->input('password'));
    $user->grupo      = $request->input('grupo');
    $user->estado     = $estado;
    $user->save();
    return  redirect()->action('UsuarioController@index');
  }

  public function viewuser($id){
    $user = User::find($id);
    return view('auth.ver', compact('user'));
  }

  public function delete($id){/*
    $user = User::find($id);
    $user->delete();
    return redirect()->action('Auth\AuthController@index');*/
  }

  public function profile(Request $request){
    $id = \Auth::user()->id;
    $user = User::find($id);
    return view('auth.profile', compact('user'));
  }

  public function profileActulizar(Request $request){
    $id = \Auth::user()->id;
    $user = User::find($id);
    $estado = false;
    if($request->input('estado') == 'on'){
        $estado = true;
    }
    $user->name       = $request->input('name');
    $user->username   = $request->input('username');
    $user->email      = $request->input('email');
    if( strlen($request->input('password')) > 0 )
      $user->password = bcrypt($request->input('password'));
    $user->grupo_id   = $request->input('grupo');
    $user->estado     = $estado;
    $user->save();
    return  redirect('usuarios/info/ver?msj=1');
  }
}
