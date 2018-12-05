<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use DB;
use Auth;

class MemberController extends Controller
{
  public function index(){
     $members=users::paginate(10);
     $id =Auth::user()->id;
     $profile = DB::table('users')->where(['id'=>$id])->first();
     return view('admin.pages.members',['members'=>$members,'profile'=>$profile]);
  }

  public function addmembers(){
    $id =Auth::user()->id;
    $profile = DB::table('users')->where(['id'=>$id])->first();
    return view('admin.pages.addmember',['profile'=>$profile]);
  }



  public function changejobtocaptain($id){
    $task=users::find($id);
    $task->job='Captain';
    $task->save();
    return redirect()->back();
  }
  public function changejobtovolunteer($id){
    $task=users::find($id);
    $task->job='Volunteer';
    $task->save();
    return redirect()->back();
  }
  public function changejobtostaff($id){
    $task=users::find($id);
    $task->job='Staff';
    $task->save();
    return redirect()->back();
  }





}
