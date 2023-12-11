<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //Get
    public function getProduct(){
        $data['productList'] = Product::all();
        $data['cate'] = Category::all();
        $data['mode'] = 'table';
        return view('Admin.backend.products', $data);
    }

    public function getAddProduct(){
        $data['categoryList'] = Category::all();
        return view('Admin.backend.addproduct2', $data);
    }

    public function getEditProduct($id){
        $data['categoryList'] = Category::all();
        $data['product'] = Product::find($id);
        return view('Admin.backend.editproduct', $data);
    }

    //Post
    public function postAddProduct(Request $request){
        $path = Storage::putFile('public/images/product', $request->file('image'));

        $str = explode('/', $path);

        $realPath = '';

        foreach($str as $item){
            if($item == 'public'){
                continue;
            }
            $realPath .= '/' . $item;
        }

        $product = new Product();
        $product->product_name = $request->name;
        $product->product_slug = Str::slug($request->name);
        $product->product_desc = $request->description;
        $product->product_image = $realPath;
        $product->product_price = $request->price;
        $product->product_count = $request->count;
        $product->product_type = $request->category;
        $product->save();

        return redirect()->back()->with(['add_product_success' => 'Thêm Sản Phẩm Thành Công!!!']);
    }

    public function postEditProduct(EditProductRequest $request, $id){
        $product = new Product();
        $data['product_name'] = $request->name;
        $data['product_slug'] = Str::slug($request->name);
        $data['product_desc'] = $request->description;
        $data['product_type'] = $request->category;
        $data['product_count'] = $request->count;
        $data['product_price'] = $request->price;

        if($request->file('image')){
            $path = Storage::putFile('public/images/product', $request->file('image'));

            $str = explode('/', $path);

            $realPath = '';

            foreach($str as $item){
                if($item == 'public'){
                    continue;
                }
                $realPath .= '/' . $item;
            }

            $data['product_image'] = $realPath;
        }

        $product::where('product_id', $id)->update($data);
        return redirect('admin/product')->with(['edit_product_success' => 'Thay Đổi Sản Phẩm Thành Công!!!']);
    }

    public function getDeleteProduct($id){
        Product::destroy($id);
        return redirect()->back()->with(['delete_product_success' => 'Xoá Sản Phẩm Thành Công!!!']);
    }
}
