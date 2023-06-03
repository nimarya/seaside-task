<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return view('cart', [
            'products' => Product::all(),
        ]);
    }

    public function store(int $id)
    {
        $user = Auth::user();
        $products = json_decode($user->products);

        // check if there is already this product in the user's cart
        if (!in_array($id, $products)) {
            $products[] = $id;
            $user->products = json_encode($products);
            $user->update();
        }

        return redirect('cart');
    }
}
