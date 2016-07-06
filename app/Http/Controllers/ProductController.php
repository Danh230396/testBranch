<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Product;
// use App\Category;
use App\Image;
// use File;

class ProductController extends Controller
{
    #thuc hien add san pham vao database
    #xuat form ra cho nguoi dung nhap du lieu
    function getAdd(){
        //$cate = Category::select('id', 'name', 'parent_id')->get()->toArray();
        return view('admin.product.add');
    }
    
    #Thuc hien qua trinh xu ly du lieu request tu form
    function postAdd(ProductRequest $request){
        #thuc hien gan ten file bang ham rand() va + phan duoi
        $fileName = rand().mt_rand().'.'.$request->file('fImages')->getClientOriginalExtension();
        
        #thuc hien insert data vao du lieu
        $product = new Product;
        $product->name = $request->txtName;
        $product->slug = $request->txtName;
        $product->price = $request->txtPrice;
        $product->saleprice = $request->txtSalePrice;
        $product->image = $fileName;
        $product->intro = $request->txtIntro;
        $product->quantity = $request->txtQuantity;
        $product->description = $request->description;
        $product->keywords = $request->txtKeyword;
        $product->cate_id = $request->category;
        $product->liked = 0;
        $product->viewed = 0;
        $product->saled = 0;
        $product->save();
        $product_id = $product->id;
        
        #thuc hien move file vao folder duoc chi dinh truoc
        $destination = 'resources/upload/images/products/avatar/';
        $request->file('fImages')->move($destination,$fileName);
        
        #thuc hien them nhieu anh vao san pham vua moi add
        if($request->file('fImagesDetail')){
            $images = $request->file('fImagesDetail');
            foreach($images AS $image){
                if(isset($image)){
                    $fileName = rand().mt_rand().rand().mt_rand().'.'.$image->getClientOriginalExtension();
                    $productImage = new \App\Image();
                    $destination = 'resources/upload/images/products/details/';
                    $productImage->name = $fileName;
                    $productImage->product_id = $product_id;
                    $productImage->path = $destination.$fileName;
                    $productImage->save();
                    $image->move($destination, $fileName);
                }
            }
        }
       // return redirect()->route('admin.products.list')->with(['flash_message' => 'Success!', 'flash_level' => 'success']);
    }
    
    // #function thuc hien show list product ra ngoai
    // function getList(){
    //     $products = Product::select("id","name","cate_id","price","created_at")->orderBy('created_at', 'DESC')->get();
    //     return view('admin.product.list', compact('products',$products));
    // }
    
    // #function thuc hien xoa san pham cua no va tat ca cac hinh anh thuoc ve no
    // function getDelete($id){
    //     $images = Product::find($id)->getImages;
    //     foreach ($images as $value) {
    //         File::delete('resources/upload/images/products/'.$value->image);
    //     }
    //     $product = Product::find($id);
    //     $product->delete();
    //     File::delete('resources/upload/images/products/'.$product->image);
    //     echo 'Thanh cong';
    // }

    // #function getEdit thuc hien show form cho user nhap data de update
    // function getEdit($id){
    //     $product = Product::find($id);
    //     $cate = Category::select('id', 'name', 'parent_id')->get()->toArray();
    //     return view('admin.product.edit',compact('cate', 'product'));
    // }




    // #function bay se thao tac voi ajax
    
    // function getData(){
    //     $products = Product::select("id","name","cate_id","price","created_at")->orderBy('created_at', 'DESC')->get()->tojSon();
    //     return $products;
    // }
    
    // function testAjax(){
    //     return view("admin.product.ajax");
    // }
}
