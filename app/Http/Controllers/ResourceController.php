<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Vimeo;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index($slug)
    {
    
        $category = Category::where('slug', $slug)->first();
        $videos = Category::where('slug', $slug)->first()->videos;
      
        return view('ressources.index', compact('category','videos'));       
    }

    public function video()
    {
       
        return view('ressources.video');
    }

    public function mots()
    {
        return view('ressources.mots');
    }


    public function vimeo($category, $slug)
    {

        $category = Category::where('slug', $category)->first();
       
        $vimeo = Vimeo::where('slug', $slug)->first();
        
        $vimeos = $category->videos;  
        if (!$vimeo) {
            // Handle case where no videos exist
            $vimeo = null; // Or set a default video object if desired
        }    
        return view('ressources.vimeo', compact('category','vimeo', 'vimeos'));
    }


}
