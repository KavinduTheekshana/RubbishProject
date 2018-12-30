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

class CaptainController extends Controller
{
    public function getCaptainView(){
      $title='Captain Dashboard';

      $data = DB::table('users')->count();
      $members = DB::table('users')->orderBy('id', 'desc')->paginate(8);
      $id =Auth::user()->id;
      $profile = DB::table('users')->where(['id'=>$id])->first();
      $post =DB::table('posts')->orderBy('postid', 'desc')->paginate(4);
      $messagecount=DB::table('messages')->where('read_or_not','0')->get();
      $message=DB::table('messages')->where('read_or_not','0')->orderby('id','desc')->get();

    return view('captain/captain',['users'=>$data,'members'=>$members,
      'profile'=>$profile,'title'=>$title,'post'=>$post,'messagecount'=>$messagecount,'message'=>$message]);
    }

    public function captainprofile(){

      $id =Auth::user()->id;
      $name =Auth::user()->name;
      $title=$name;
      $profile = DB::table('users')->join('cities','users.city','=','cities.city_id')->where(['id'=>$id])->first();

      $post =DB::table('posts')->join('users','posts.user_id','=','users.id')->
      where(['user_id'=>$id])->orderBy('posts.postid', 'desc')->paginate(4);

      $messagecount=DB::table('messages')->where('read_or_not','0')->get();
      $message=DB::table('messages')->where('read_or_not','0')->orderby('id','desc')->get();

      return view('captain/profile',['profile'=>$profile,'post'=>$post,'title'=>$title,
      'messagecount'=>$messagecount,'message'=>$message]);
    }

    public function captainpostarticle(){

      $title='Post Article';
      $id =Auth::user()->id;
      $profile = DB::table('users')->where(['id'=>$id])->first();

      $messagecount=DB::table('messages')->where('read_or_not','0')->get();
      $message=DB::table('messages')->where('read_or_not','0')->orderby('id','desc')->get();

    return view('captain/postarticle',['profile'=>$profile,'title'=>$title,
    'messagecount'=>$messagecount,'message'=>$message]);
    }



    public function addPost(Request $request){
      $this->validate($request, [
        'post_title' => ['required', 'max:255'],
        'post_image'=>['required'],
        'category'=>['required'],
        'post_body'=>['required'],
       ]);

       $id =Auth::user()->id;
       $posts = new post();
       $posts->user_id = $id;
       $posts->post_title = $request->input('post_title');
       $posts->category = $request->input('category');
            if(Input::hasFile('post_image')){
                $file=Input::file('post_image');
                $file->move(public_path().'/uploads/posts',
                $file->getClientOriginalName());
                $url=URL::to("/").'/uploads/posts/'.$file->getClientOriginalName();
                $posts->post_image = $url;
            }
            $posts->post_body = $request->input('post_body');
       $posts->save();
       return redirect('captainprofile')->with('status', 'Post Added Sucessfully');

    }

}
