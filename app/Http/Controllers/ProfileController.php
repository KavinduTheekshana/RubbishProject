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
// use Illuminate\View\View;
// use Illuminate\Support\Facades\Input;
// use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\URL;
// use Auth;
// use App\Profile;
// use Symfony\Component\Console\Input\Input;


class ProfileController extends Controller
{
    public function profile(){
        return view('profile.profile');
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
       $users->password = encrypt($request->input('password'));
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
        // return ('test');
        // $this->validate($request,[
        //     'name'=>'required',
        //     'destination'=>'required',
        //     'profile_pic'=>'required'
        // ]);

        // $profiles = new Profile();
        // $profiles->name = $request->input('name');
        // $profiles->user_id=Auth::user()->id;
        // $profiles->destination = $request->input('destination');
        //     if(Input::hasFile('profile_pic')){
        //         $file=Input::file('profile_pic');
        //         $file->move(public_path().'/uploads/',
        //         $file->getClientOriginalName());
        //         $url=URL::to("/").'/uploads/'.$file->getClientOriginalName();
        //     }

        // $profiles->profile_pic = $url;
        // $profiles->save();
        // return redirect('/home')->with('response','Profile Added Sucessfully');
        // return redirect('/profile')->with('responce','Profile Addes Successfully');
    }
}
