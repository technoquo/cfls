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
        return view('boutique.detail', compact('product', 'imagefirst'));
    }

    public function checkout()
    {
        return view('boutique.checkout');
    }
}
