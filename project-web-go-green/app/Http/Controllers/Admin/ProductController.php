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
        $data['products'] = Product::all();
        $data['cate'] = Category::all();
        return view('Admin.backend.products', $data);
    }

    public function getAddProduct(){
        $data['categoryList'] = Category::all();
        return view('Admin.backend.addproduct', $data);
    }

    public function getEditProduct($id){
        $data['categoryList'] = Category::all();
        $data['product'] = Product::find($id);
        return view('Admin.backend.editproduct', $data);
    }

    public function getSearchResult(Request $request){
        $result = str_replace(' ', '%', $request->result); // Remove BackSpace
        $data['searchProduct'] = $request->result;
        $data['productFounds'] = Product::where('product_name', 'like', '%' . $result . '%')->get();
        $data['productCount'] = Product::where('product_name', 'like', '%' . $result . '%')->count();
        return view('Admin.backend.searchproduct', $data);
    }

    //Post
    public function postAddProduct(AddProductRequest $request){
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

        return back();
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
        return redirect('admin/product');
    }

    public function getDeleteProduct($id){
        Product::destroy($id);
        return redirect('admin/product');
    }
}
