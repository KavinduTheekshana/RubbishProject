<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Auth;
use App\Profile;


class ProfileController extends Controller
{
    public function profile(){
        return view('profile.profile');
    }

    public function AddProfile(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'destination'=>'required',
            'profile_pic'=>'required'
        ]);
        
        $profiles = new Profile();
        $profiles->name = $request->input('name');
        $profiles->user_id=Auth::user()->id;
        $profiles->destination = $request->input('destination');
        $profiles->profile_pic = $request->input('profile_pic');
        
        return Auth::user();
        exit();
    }
}
