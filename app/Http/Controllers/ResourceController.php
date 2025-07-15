<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MotsCroise;
use App\Models\Vimeo;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index($slug)
    {




        // Array de vistas especiales
        $specialViews = [
            'mots-croises' => 'ressources.mots',
           // 'vocabulaire' => 'ressources.vocabulaire',
        ];

        // Si es una vista especial, retornarla directamente
        if (array_key_exists($slug, $specialViews)) {
            switch ($slug) {
//                case 'vocabulaire':
//                    $category = Category::where('slug', $slug)
//                               ->where('status', 1)
//                               ->get();
//
//                    $videos = Vimeo::where('status', 1)
//                              ->where('categories_id', $category[0]->id)
//                              ->get();
//                    break;
                case 'mots-croises':
                    $videos = MotsCroise::where('status', 1)->get();;
                    break;
                default:
                    abort(404);
            }


            return view($specialViews[$slug], compact('videos'));
        }

        // Manejo estándar de categorías
        $category = Category::with(['videos' => fn($q) => $q->orderBy('id', 'desc')->where('status', 1)])
            ->where('slug', $slug)
            ->first();

        return view('ressources.index')->with([
            'category' => $category,
            'videos' => $category->videos
        ]);
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

        $video = Vimeo::where('slug', $slug)->first();


        $videos = $category->videos->sortBy('title');

        if (!$video) {
            // Handle case where no videos exist
            $video = null; // Or set a default video object if desired
        }
        return view('ressources.vimeo', compact('category','video', 'videos'));
    }




}
