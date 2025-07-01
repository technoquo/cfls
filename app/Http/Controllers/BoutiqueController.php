<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $options = $product->options;
        return view('boutique.detail', compact('product', 'imagefirst', 'images', 'options'));
    }

    public function checkout(Request $request)
    {
        $user = Auth::user(); // puede ser null si no está logueado

        $cart = [];

        if ($request->has('cart_data')) {
            $cart = json_decode($request->input('cart_data'), true);
        }

        return view('boutique.checkout', compact('cart', 'user'));
    }

    public function clear(Request $request)
    {
        session()->forget('cart'); // o el método que uses
        return response()->json(['status' => 'ok']);
    }
}
