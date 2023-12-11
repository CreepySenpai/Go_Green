<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Get
    public function getCategory(){
        $data['categoryList'] = Category::all();
        return view('Admin.backend.category', $data);
    }

    public function getAddCategory(){
        return view('Admin.backend.addcategory');
    }

    public function getEditCategory($id){
        $data['category'] = Category::find($id);
        return view('Admin.backend.editcategory', $data);
    }

    // Post
    public function postAddCategory(AddCategoryRequest $request){
        $category = new Category();
        $category->cate_name = $request->cate_name;
        $category->cate_des = $request->description;
        $category->cate_slug = Str::slug($request->cate_name);

        $category->save(); // save to database
        return redirect()->back()->with(['add_category_success' => 'Thêm Danh Mục Thành Công!!!']);
    }

    public function postEditCategory(EditCategoryRequest $request, $id){
        $category = Category::find($id);
        $category->cate_name = $request->cate_name;
        $category->cate_des = $request->description;
        $category->cate_slug = Str::slug($request->cate_name);
        $category->save();

        return redirect('admin/category')->with(['edit_category_success' => 'Thay Đổi Danh Mục Thành Công!!']); // return to category
    }

    // Delete
    public function getDeleteCategory($id){
        Category::destroy($id);
        return redirect()->back()->with(['delete_category_success' => 'Xoá Danh Mục Thành Công!!!']);
    }
}
