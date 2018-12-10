<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
class CategoryController extends Controller
{
    public function getCate(){
    	$data['catelist'] = Category::all();
    	return view('backend.category',$data);
    }
    public function getCateEdit($id){
    	$data['cate'] = Category::find($id);

    	return view('backend.editcategory',$data);
    }
    public function postCateEdit(EditCateRequest $req,$id){
    	$category = Category::find($id);
    	$category->cate_name=$req->name;
    	$category->cate_slug = str_slug($req->name);
    	$category->save();
    	 return redirect('admin/admin/category/');
    }
    public function getCateDelete($id){
    	Category::destroy($id);
    	return back();
    }
    public function postCateAdd(AddCateRequest $req){
    	$category = new Category;
    	$category->cate_name=$req->name;
    	$category->cate_slug = str_slug($req->name);
    	$category->save();
    	 return redirect('admin/admin/category//')->with('success','Bạn đã thêm thành công!');
    }
}
