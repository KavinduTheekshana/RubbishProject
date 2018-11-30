<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;

class allController extends Controller
{
  public function dash(){
    $data = DB::table('users')->count();
    return view('admin.Dashboard',['users'=>$data]);
  }
}
