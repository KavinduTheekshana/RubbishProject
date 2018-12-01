<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;

class MemberController extends Controller
{
  public function index(){
     $members=users::all();
     return view('admin.pages.tables.simple',compact('members'));
  }

  public function addmembers(){
    return view('admin.pages.addmember');
  }
}
