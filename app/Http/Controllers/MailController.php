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

  public function sentbox(){
    $title='Sent Mail';
    $id =Auth::user()->id;
    $mails=DB::table('mails')->join('users','mails.publisher_id','=','users.id')->where(['publisher_id'=>$id])->paginate(10);
    $profile = DB::table('users')->where(['id'=>$id])->first();
    return view('admin.pages.sentmail',['profile'=>$profile,'title'=>$title,'mails'=>$mails]);
  }

  public function inbox(){
    $title='Inbox';
    $id =Auth::user()->id;
    $mails=DB::table('mails')->join('users','mails.publisher_id','=','users.id')->where(['publisher_id'=>$id])->paginate(10);
    $profile = DB::table('users')->where(['id'=>$id])->first();
    return view('admin.pages.inbox',['profile'=>$profile,'title'=>$title,'mails'=>$mails]);
  }

  public function draft(){
    $title='Draft';
    $id =Auth::user()->id;
    $mails=DB::table('mails')->join('users','mails.publisher_id','=','users.id')->where(['publisher_id'=>$id])->paginate(10);
    $profile = DB::table('users')->where(['id'=>$id])->first();
    return view('admin.pages.draft',['profile'=>$profile,'title'=>$title,'mails'=>$mails]);
  }

  public function trash(){
    $title='Trash';
    $id =Auth::user()->id;
    $mails=DB::table('mails')->join('users','mails.publisher_id','=','users.id')->where(['publisher_id'=>$id])->paginate(10);
    $profile = DB::table('users')->where(['id'=>$id])->first();
    return view('admin.pages.trash',['profile'=>$profile,'title'=>$title,'mails'=>$mails]);
  }

  public function sendmail(Request $request){
    $this->validate($request, [
      'to'=>['required'],
      'subject'=>['required'],
      'body'=>['required'],
     ]);

     $id =Auth::user()->id;

     $mails = new mails();
     $mails->publisher_id = $id;
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
     $mails->ststus = 'send';
     $mails->save();
     return redirect('sentbox')->with('status', 'Email Send Sucessfully');
  }

  public function adddraft(Request $request){
    $this->validate($request, [
      'to'=>['required'],
      'subject'=>['required'],
      'body'=>['required'],
     ]);

     $id =Auth::user()->id;

     $mails = new mails();
     $mails->publisher_id = $id;
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
     $mails->ststus = 'draft';
     $mails->save();
     return redirect('draft')->with('status', 'Email Added To Draft');
  }

  public function readmail($postid){
    $title='Read Mail';
    $id =Auth::user()->id;
    $mails=DB::table('mails')->join('users','mails.publisher_id','=','users.id')->where(['publisher_id'=>$id])->first();
    $profile = DB::table('users')->where(['id'=>$id])->first();
    return view('admin.pages.readmail',['profile'=>$profile,'title'=>$title,'mails'=>$mails]);
  }


}
