<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use function Livewire\store;

class ProductController extends Controller
{
    //Get
    public function getProduct(){
        $data['products'] = Product::all();
        return view('Admin.backend.products', $data);
    }

    public function getAddProduct(){
        return view('Admin.backend.addproduct');
    }

    public function getEditProduct(){

        return view('Admin.backend.editproduct');
    }

    //Post
    public function postAddProduct(AddProductRequest $request){
        echo "$request->name";
        echo "$request->description";
        echo "$request->category";

        $path = Storage::putFile('images/product', $request->file('image'));

        $product = new Product();
        $product->product_name = $request->name;
        $product->product_slug = Str::slug($request->name);
        $product->product_desc = $request->description;
        $product->product_image = $path;
        $product->product_price = $request->price;

    }

    public function postEditProduct(){

    }

    public function getDeleteProduct(){

    }
}
