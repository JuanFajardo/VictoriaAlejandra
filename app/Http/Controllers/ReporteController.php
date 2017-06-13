<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reporte;

class ReporteController extends Controller
{
  public function angular(){
    return view('reporte.index');
  }

  public function index(){
  }

  public function show($id){
  }

  public function store(Request $request){
  }

  public function update(Request $request, $id){
  }

  public function destroy($id){
  }

}
