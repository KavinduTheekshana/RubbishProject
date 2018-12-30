<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use DB;
use App\users;
use App\post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Exceptions;

class VolunteerController extends Controller
{
    public function getvolunteerView(){
        $title='Captain Dashboard';

        $data = DB::table('users')->count();
        $members = DB::table('users')->orderBy('id', 'desc')->paginate(8);
        $id =Auth::user()->id;
        $profile = DB::table('users')->where(['id'=>$id])->first();
        $post =DB::table('posts')->orderBy('postid', 'desc')->paginate(4);
        $messagecount=DB::table('messages')->where('read_or_not','0')->get();
        $message=DB::table('messages')->where('read_or_not','0')->orderby('id','desc')->get();

        $notification=DB::table('notifications')->where('read_or_not','0')->orderby('id','desc')->get();

      return view('volunteer/Volunteer',['users'=>$data,'members'=>$members,
        'profile'=>$profile,'title'=>$title,'post'=>$post,'messagecount'=>$messagecount,
        'message'=>$message,'notification'=>$notification]);
      }


}
