<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        return view('ressources.videoinfo');
    }

    public function video()
    {
        
        return view('ressources.video');
    }

    public function mots()
    {
        return view('ressources.mots');
    }


    public function vimeo($slug)
    {
        return view('ressources.vimeo');
    }


}
