<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;
use App\users;
use Auth;

class LocationController extends Controller
{
  public function droplocation(){
    $title='Drop Locations';
    $data = DB::table('users')->count();
    $members = DB::table('users')->orderBy('id', 'desc')->paginate(8);
    $id =Auth::user()->id;
    $profile = DB::table('users')->where(['id'=>$id])->first();

    $messagecount=DB::table('messages')->where('read_or_not','0')->get();
    $message=DB::table('messages')->where('read_or_not','0')->orderby('contact_id','desc')->get();

    return view('admin.pages.droplocation',['users'=>$data,'members'=>$members,'profile'=>$profile,
    'title'=>$title,'messagecount'=>$messagecount,'message'=>$message]);

  }
}
