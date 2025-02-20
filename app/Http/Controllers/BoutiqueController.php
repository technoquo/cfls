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
        return view('boutique.detail', compact('slug'));
    }

    public function checkout()    
    {
        return view('boutique.checkout');
    }
}
