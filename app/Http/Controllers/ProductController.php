<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(int $id)
    {
        return view('product-single', [
            'product' => Product::find($id),
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'cover' => 'required|max:255',
            'images' => 'required|max:255',
            'name' => 'required|max:255',
            'cost' => 'required|max:5000',
            'description' => 'required|max:5000',
            'size' => 'required|max:255',
        ]);

        $coverFileName = $attributes['cover']->getClientOriginalName();
        $attributes['cover']->move(public_path('assets/images'), $coverFileName);
        $attributes['cover'] = $coverFileName;

        $imagesFileName = $attributes['images']->getClientOriginalName();
        $attributes['images']->move(public_path('assets/images'), $imagesFileName);
        $attributes['images'] = $imagesFileName;

        $productId = Product::create($attributes)->id;

        return redirect('/products/' . $productId);
    }
}
