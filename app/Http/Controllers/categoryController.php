<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
//use Symfony\Component\HttpFoundation\Request;

class categoryController extends Controller
{
    public function category(){
        return view('category.category');
    }

    public function addcategory(Request $request){
        $this->validate($request,[
            'category'=>'required'
        ]);
        return 'validation passed';
    }
}
