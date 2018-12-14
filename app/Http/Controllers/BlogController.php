<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;
use App\post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Exceptions;

class BlogController extends Controller
{


  public function index(){
    $title='Colombo Municipal Council Smart Cleaning Service';
    $posts =DB::table('posts')->orderBy('posts.postid', 'desc')->paginate(4);
    $slider =DB::table('posts')->orderBy('posts.postid', 'desc')->get();
    return view('blog.index',['posts'=>$posts,'slider'=>$slider,'title'=>$title]);
  }

  public function viewpost($post_id){

    $post =DB::table('posts')->join('users','posts.user_id','=','users.id')->where(['posts.postid'=>$post_id])->get();
    $title='View Post';
    return view('blog.post',['post'=>$post,'title'=>$title]);
  }

  public function deletepost($post_id){
    DB::table('posts')->where('postid', $post_id)->delete();
    return redirect()->back()->with('status', 'Post Delete Sucessfully');
  }

  public function editpost($post_id){
    $title='Edit Post';
    $id =Auth::user()->id;
    $profile = DB::table('users')->where(['id'=>$id])->first();
    $editpost=DB::table('posts')->where('postid', $post_id)->first();
    return view('admin.pages.editpostarticle',['profile'=>$profile,'editprofile'=>$editpost,'title'=>$title]);
  }




}
