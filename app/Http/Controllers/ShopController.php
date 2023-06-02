<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        if (request('category_id')) {

            request()->validate([
                'category_id' => 'exists:categories,id',
            ]);

            $products = $products->where('category_id', request('category_id'));
        }

        return view('shop', [
            'products' => $products,
            'categories' => Category::all(),
        ]);
    }
}
