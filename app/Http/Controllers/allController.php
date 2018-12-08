<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;
use App\users;
use Auth;

class allController extends Controller
{
  public function dash(){
    $title='Dashboard';
    $data = DB::table('users')->count();
    $members = DB::table('users')->orderBy('id', 'desc')->paginate(8);
    $id =Auth::user()->id;
    $profile = DB::table('users')->where(['id'=>$id])->first();
    return view('admin.Dashboard',['users'=>$data,'members'=>$members,'profile'=>$profile,'title'=>$title]);
    // return view('admin.Dashboard',['users'=>$data,'members'=>$members]);

  }
}
