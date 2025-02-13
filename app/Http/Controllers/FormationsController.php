<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormationsController extends Controller
{
    public function index(){

        return view('formations.index');
    }

    public function formations($slug){
       
        $title = $slug;
        return view('formations.'.$slug, compact('title'));
    }
}
