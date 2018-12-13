<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;
use App\users;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\post;
use App\message;

class ContactController extends Controller
{

  public function contactView(){
    $title='Contact Us';
    return view('blog.contact',['title'=>$title]);
  }

  public function contactSave(Request $request){
    $this->validate($request, [
      'name' => ['max:100','required'],
      'email' => ['required', 'string', 'email', 'max:255'],
      'subject'=>['required'],
      'message'=>['required'],
     ]);

     $msg = new message();
     $msg->name = $request->input('name');
     $msg->email = $request->input('email');
     $msg->subject = $request->input('subject');
     $msg->message = $request->input('message');
     $msg->save();
     // return redirect('addmembers')->with('status', 'Profile Added Sucessfully');
     return redirect()->back()->with('status', 'Your Message Send Sucessfully');
  }
}
