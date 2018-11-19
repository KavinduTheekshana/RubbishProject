<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Auth;
use App\Profile;
// use Symfony\Component\Console\Input\Input;


class ProfileController extends Controller
{
    public function profile(){
        return view('profile.profile');
    }

    public function addProfile(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'destination'=>'required',
            'profile_pic'=>'required'
        ]);
        
        $profiles = new Profile();
        $profiles->name = $request->input('name');
        $profiles->user_id=Auth::user()->id;
        $profiles->destination = $request->input('destination');
            if(Input::hasFile('profile_pic')){
                $file=Input::file('profile_pic');
                $file->move(public_path().'/uploads/',
                $file->getClientOriginalName());
                $url=URL::to("/").'/uploads/'.$file->getClientOriginalName();
            }

        $profiles->profile_pic = $url;
        $profiles->save();
        return redirect('/home')->with('response','Profile Added Sucessfully');
        // return redirect('/profile')->with('responce','Profile Addes Successfully');
    }
}
