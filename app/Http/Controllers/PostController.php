<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function post(){
        return view('posts.post');
    }
}
