<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Category;
use DB;

class categoryController extends Controller
{
    public function category(){
        return view('category.category');
    }

    public function addcategory(Request $request){
        $this->validate($request,[
            'category'=>'required'
        ]);
        $category = new Category;
        $category->category=$request->input('category');
        $category->save();
        return redirect('/category')->with('response','Category Added Sucessfully');

        // $category = $request->input('category');
        // $category->save();
        
    }
}
