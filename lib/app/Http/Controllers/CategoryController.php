<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCate(){
    	return view('backend.category');
    }
    public function getCateEdit(){
    	return view('backend.editcategory');
    }
}
