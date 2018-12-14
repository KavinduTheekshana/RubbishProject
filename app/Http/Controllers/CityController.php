<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\citie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\post;

class CityController extends Controller
{
  public function addcities(){
    $title='Add Cities';
    $id =Auth::user()->id;
    $profile = DB::table('users')->where(['id'=>$id])->first();
    $city=DB::table('cities')->get();
    $citycount=DB::table('cities')->count();

    $messagecount=DB::table('messages')->where('read_or_not','0')->get();
    $message=DB::table('messages')->where('read_or_not','0')->orderby('contact_id','desc')->get();

    return view('admin.pages.addcities',['profile'=>$profile,'city'=>$city,
    'citycount'=>$citycount,'title'=>$title,'messagecount'=>$messagecount,'message'=>$message]);
  }


  public function addcity(Request $request){
    $this->validate($request, [
      'city' => ['required','max:100','unique:cities,city'],
     ]);
     $cities = new citie();
     $cities->city = $request->input('city');
     $cities->save();
     return redirect('addcities')->with('status', 'City Added Sucessfully');

  }
}
