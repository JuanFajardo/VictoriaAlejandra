<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
      if( \Auth::guest() )
        return redirect('index.php/login');
      //elseif(\Auth::user()->grupo != '2' && \Auth::user()->grupo_id != 3 && \Auth::user()->grupo_id != 1)
      //  return abort(503);
    }



    public function index()
    {
        return view('home');
    }
}
