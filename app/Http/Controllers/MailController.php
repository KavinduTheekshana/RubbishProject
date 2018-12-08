<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\citie;
use App\mails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\post;

class MailController extends Controller
{
  public function compose(){
    $title='Compose Mail';
    $id =Auth::user()->id;
    $profile = DB::table('users')->where(['id'=>$id])->first();
    return view('admin.pages.Compose',['profile'=>$profile,'title'=>$title]);
  }

  public function sent(){
    $title='Sent Mail';
    $id =Auth::user()->id;
    $profile = DB::table('users')->where(['id'=>$id])->first();
    return view('admin.pages.sentmail',['profile'=>$profile,'title'=>$title]);
  }

  public function sendmail(Request $request){
    $this->validate($request, [
      'to'=>['required'],
      'subject'=>['required'],
      'body'=>['required'],
     ]);

     $mails = new mails();
     $mails->to = $request->input('to');
     $mails->subject = $request->input('subject');
     $mails->body = $request->input('body');
     if(Input::hasFile('attachment')){
         $file=Input::file('attachment');
         $file->move(public_path().'/uploads/Mail/',
         $file->getClientOriginalName());
         $url=URL::to("/").'/uploads/Mail/'.$file->getClientOriginalName();
         $mails->attachment = $url;
     }
     $mails->action = 'send';
     $mails->save();
     return redirect('compose')->with('status', 'Profile Added Sucessfully');
  }
}
