<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use DB;
use Auth;

class MemberController extends Controller
{
  public function index(){
     $members=users::all();
     $id =Auth::user()->id;
     $profile = DB::table('users')->where(['id'=>$id])->first();
     return view('admin.pages.members',['members'=>$members,'profile'=>$profile]);
  }

  public function addmembers(){
    $id =Auth::user()->id;
    $profile = DB::table('users')->where(['id'=>$id])->first();
    return view('admin.pages.addmember',['profile'=>$profile]);
  }
}
