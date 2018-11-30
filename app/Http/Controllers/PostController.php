<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;

class PostController extends Controller
{
    public function post(){
      $data = DB::table('users')->count();
      return view('admin.Dashboard',['users'=>$data]);
        // return view('admin.Dashboard');
    }
}
