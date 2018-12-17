<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlockedController extends Controller
{
    public function getblockedView(){
        return view('blocked');
    }

}
