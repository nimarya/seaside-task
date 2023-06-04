<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $itemsInCart = json_decode(Auth::user()->products);

        // sending to view only user's products in cart
        return view('cart', [
            'products' => Product::all()->whereIn('id', $itemsInCart),
        ]);
    }

    public function addProductInCart(int $id)
    {
        $user = Auth::user();
        $products = json_decode($user->products, JSON_OBJECT_AS_ARRAY);

        // check if there is already this product in the user's cart
        if (!in_array($id, $products)) {
            $products[] = $id;
            $user->products = json_encode($products);
            $user->update();
        }

        return redirect('cart');
    }

    public function removeProductFromCart(int $id)
    {
        $user = Auth::user();
        $products = json_decode($user->products, JSON_OBJECT_AS_ARRAY);

        $key = array_search($id, $products);

        // check if there is this item in cart
        if ($key !== false) {
            unset($products[$key]);
            $user->products = json_encode($products);
            $user->update();
        }

        return redirect('cart');
    }
}
