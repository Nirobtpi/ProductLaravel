<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function addProductUrl(){
        return view('backend.product.add-product');
    }
    // add product 
    function addProduct(Request $request){
      $request->validate([
            'product_name'=>['required'],
            'product_size'=>['required'],
        ],[
            'product_name.required'=>'Product Name Is Required!',
            'product_size.required'=>'Product Size Is Required!',
        ]);

        Product::insert([
            'product_name'=>$request->product_name,
            'product_size'=>$request->product_size,
            'product_type'=>$request->product_type,
            'product_description'=>$request->product_description,
            'created_at'=>Carbon::now(),
        ]);

        return back()->with('success','Data Insert Successfully!');
    }

    // view product url 

    function viewProductUrl(){
        $count=Product::withTrashed()->count();
        $products=Product::orderby('product_name','asc')->simplepaginate(3);
        return view('backend.product.view-product', compact('products', 'count'));
    }
    // edit product url 

    function editProductUrl($id){
        $product=Product::findOrFail($id);
        return view('backend.product.edit-product',compact('product'));
    }

    // update product function 

    function updateProduct(Request $request){
     $request->validate([
            'product_name'=>['required'],
            'product_size'=>['required'],
        ],[
            'product_name.required'=>'Product Name Is Required!',
            'product_size.required'=>'Product Size Is Required!',
        ]);
    
        Product::findOrFail($request->product_id)->update([
            'product_name'=>$request->product_name,
            'product_size'=>$request->product_size,
            'product_type'=>$request->product_type,
            'product_description'=>$request->product_description,
            'updated_at'=>Carbon::now(),
        ]);

        return back()->with("success",'Data Update Successfully');
    }
    // soft delete 
    function deleteProduct($id){
        Product::findOrFail($id)->delete();
        return back()->with('success','Data Delete Sucessfully');
    }


    function deletedDataView(){
        $count=Product::withTrashed()->count();
        $products=Product::orderby('product_name','asc')->onlyTrashed()->simplepaginate(1);
        return view('backend.product.deleted-view-product', compact('products','count'));
    }

    function restoreData($id){
        Product::withTrashed()->findOrFail($id)->restore();

        return back()->with("success",'Data restore successfully');
    }
    function pdelete($id){
        Product::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('delete','Data Deleted Success');
    }
}


