<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;


class ProfileController extends Controller
{



    public function profile(){
      $id =Auth::user()->id;
      $profile = DB::table('users')->where(['id'=>$id])->first();
      return view('admin.pages.profile',['profile'=>$profile]);
    }




    public function addProfile(Request $request){
      $this->validate($request, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
        'year'=>['required','numeric'],
        'month'=>['required','numeric'],
        'date'=>['required','numeric'],
        'gender'=>['required'],
        'city'=>['required'],
        'suburb'=>['required'],
       ]);

       $users = new users();
       $users->name = $request->input('name');
       $users->email = $request->input('email');
       $users->password = Hash::make($request['password']);
       $users->birthday = $request->input('year').'.'.$request->input('month').'.'.$request->input('date');
       $users->gender = $request->input('gender');
       $users->city = $request->input('city');
       $users->suburb = $request->input('suburb');
       $users->job = $request->input('job');
            if(Input::hasFile('profile_pic')){
                $file=Input::file('profile_pic');
                $file->move(public_path().'/uploads/',
                $file->getClientOriginalName());
                $url=URL::to("/").'/uploads/'.$file->getClientOriginalName();
                $users->profile_pic = $url;
            }else {
              $users->profile_pic = 'http://localhost/basicwebsite/public/uploads/default.jpg';
            }
       $users->save();
       return redirect('addmembers')->with('status', 'Profile Added Sucessfully');
    }




    public function editprofile(){
      $id =Auth::user()->id;
      $profile = DB::table('users')->where(['id'=>$id])->first();
      return view('admin.pages.editprofile',['profile'=>$profile]);
    }




    public function updateProfile(Request $request){
      $id =Auth::user()->id;
      $this->validate($request, [
        'name' => ['string', 'max:255'],
        'city'=>['required'],
        'suburb'=>['required'],
       ]);

       $users = new users();
       $users->name = $request->input('name');
       $users->email = $request->input('email');
       $users->password = Hash::make($request['password']);
       $users->birthday = $request->input('year').'.'.$request->input('month').'.'.$request->input('date');
       $users->gender = $request->input('gender');
       $users->city = $request->input('city');
       $users->suburb = $request->input('suburb');
       $users->job = $request->input('job');
            if(Input::hasFile('profile_pic')){
                $file=Input::file('profile_pic');
                $file->move(public_path().'/uploads/',
                $file->getClientOriginalName());
                $url=URL::to("/").'/uploads/'.$file->getClientOriginalName();
                $users->profile_pic = $url;
            }
            else {
              $users->profile_pic = 'http://localhost/basicwebsite/public/uploads/default.jpg';
            }
            $data=array(
              'name' => $users->name,
              'gender'=>$users->gender,
              'city'=>$users->city,
              'suburb'=> $users->suburb,
            );
            users::where('id',$id)->update($data);
       $users->update();
       return redirect('editprofile')->with('status', 'Profile Update Sucessfully');
    }




    public function updatepassword(Request $request){
      $id =Auth::user()->id;
      $this->validate($request, [
        'password' => ['string', 'min:6', 'confirmed'],
       ]);
       $users = new users();
       $users->password = Hash::make($request['password']);
            $data=array(
              'password' => $users->password,
            );
            users::where('id',$id)->update($data);
            $users->update();
        return redirect('editprofile')->with('status2', 'Password Update Sucessfully');
    }





    public function updateProfilepicture(Request $request){
      $id =Auth::user()->id;
      $this->validate($request, [
        'profile_pic'=>['required'],
       ]);
       $users = new users();
       if(Input::hasFile('profile_pic')){
           $file=Input::file('profile_pic');
           $file->move(public_path().'/uploads/',
           $file->getClientOriginalName());
           $url=URL::to("/").'/uploads/'.$file->getClientOriginalName();
           $users->profile_pic = $url;
       }
            $data=array(
              'profile_pic' => $users->profile_pic,
            );
            users::where('id',$id)->update($data);
       $users->update();
        return redirect('editprofile')->with('status3', 'Profile Picture Update Sucessfully');
    }


    public function postarticle(){
      $id =Auth::user()->id;
      $profile = DB::table('users')->where(['id'=>$id])->first();
      return view('admin.pages.postarticle',['profile'=>$profile]);
    }
}
