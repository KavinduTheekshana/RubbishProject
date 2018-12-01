<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;
use App\users;

class allController extends Controller
{
  public function dash(){
    // $members=users::all();
    $data = DB::table('users')->count();
    $members = DB::table('users')->orderBy('id', 'desc')->get();
    return view('admin.Dashboard',['users'=>$data,'members'=>$members]);
    // return view('admin.Dashboard',['users'=>$data,compact('members')]);
  }
}
