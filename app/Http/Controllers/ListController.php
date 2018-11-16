<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ListController extends Controller
{
    public function list(){
        return view('Lists.list');
    }
}
