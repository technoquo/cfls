<?php

namespace App\Http\Controllers;

use App\Models\Syllabu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SyllabusController extends Controller
{
    public function index()
    {
       $syllabus = Syllabu::where('status', 1)->get();
        return view('syllabus.index',[
            'syllabus' => $syllabus,
        ]);
    }

    public function syllabu($slug)
    {
        $syllabu = Syllabu::where('slug', $slug)
            ->where('status', 1)
            ->first();

        $themes = $syllabu
                    ->themes()
                    ->where('status', 1)
                     ->get();

//        $videos = DB::table('video_themes_cloudinary')
//            ->select('url as url_video', 'title')
//            ->where('syllabu_id', $syllabu->id)
//            ->orderBy('title', 'asc')
//            ->get()
//            ->map(function ($item) {
//                return (array) $item;
//            })
//            ->toArray();

        return view('syllabus.theme',compact('syllabu','slug','themes'));
    }

    public function theme($slug,$theme)
    {
        $syllabu = Syllabu::where('slug', $slug)
            ->where('status', 1)
            ->first();

        $theme = $syllabu->themes()
            ->where('slug', $theme)
            ->where('status', 1)
            ->first();


        $themes = $syllabu
                    ->themes()
                    ->where('status', 1)
                    ->get();



        $videos = DB::table('video_themes_cloudinary')
            ->select('url as url_video', 'title')
            ->where('syllabu_id', $syllabu->id)
            ->where('theme_id', $theme->id)
            ->orderBy('title', 'asc')
            ->get()
            ->map(function ($item) {
                return (array) $item;
            })
            ->toArray();

        return view('syllabus.show',compact('syllabu','themes','theme','videos'));
    }


}
