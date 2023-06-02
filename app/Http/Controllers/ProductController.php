<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        return view('product-single', [
            'product' => Product::find($id),
        ]);
    }

    public function create()
    {
        return view('create', [
            'products' => Product::all(),
        ]);
    }
}
