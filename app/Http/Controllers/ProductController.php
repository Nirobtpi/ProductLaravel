<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function addProductUrl(){
        return view('backend.product.add-product');
    }
}
