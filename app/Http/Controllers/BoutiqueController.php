<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
    public function index()
    {
        return view('boutique.index');
    }

    public function detail($slug)
    {
        $product = \App\Models\Product::where('slug', $slug)->first();
        $imagefirst = $product->images->first()?->image_path;
        $images = $product->images;
        return view('boutique.detail', compact('product', 'imagefirst', 'images'));
    }

    public function checkout(Request $request)
    {
        $cart = [];

        if ($request->has('cart_data')) {
            $cart = json_decode($request->input('cart_data'), true);
        }



        return view('boutique.checkout', compact('cart'));
    }

    public function clear(Request $request)
    {
        session()->forget('cart'); // o el método que uses
        return response()->json(['status' => 'ok']);
    }
}
