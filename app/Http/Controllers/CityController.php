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
    $title='Add Article';
    $id =Auth::user()->id;
    $profile = DB::table('users')->where(['id'=>$id])->first();
    $city=DB::table('cities')->get();
    $citycount=DB::table('cities')->count();
    return view('admin.pages.addcities',['profile'=>$profile,'city'=>$city,'citycount'=>$citycount,'title'=>$title]);
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
