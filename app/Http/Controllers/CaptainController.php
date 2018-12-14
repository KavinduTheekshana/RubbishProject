<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaptainController extends Controller
{
    public function getCaptainView(){
        return view('captain');
    }

}
