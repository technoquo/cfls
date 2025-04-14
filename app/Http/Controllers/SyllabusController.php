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

    public function syllabus($slug)
    {
        $syllabus = Syllabu::where('slug', $slug)
                             ->where('status', 1)
                             ->first();

        $syllabu = $syllabus->themes()->where('status', 1)->with('videos')->first();

        $videofirst = $syllabus->themes()->where('status', 1)->with('videos')->first();

         $themes = $syllabus->themes()->where('status', 1)->with('videos')->get();




        return view('syllabus.show', [
            'syllabus' => $syllabus,
            'syllabu' => $syllabu,
            'videofirst' => $videofirst->videos->first(),
            'themes' => $themes,
        ]);
    }


    public function cloudinary()
    {
        $syllabus = Syllabu::where('slug', 'ue1-themes')
            ->where('status', 1)
            ->first();

        $syllabu = $syllabus->themes()->where('status', 1)->with('videos')->first();

        $videofirst = DB::table('video_themes_cloudinary')
            ->select('url')
            ->first();


        $themes = DB::table('video_themes_cloudinary')
            ->select('url as url_video', 'title')
            ->orderBy('title', 'asc')
            ->get()
            ->map(function ($item) {
                return (array) $item;
            })
            ->toArray();


        return view('syllabus.cloudinary', [
            'syllabus' => $syllabus,
            'syllabu' => $syllabu,
            'videofirst' => $videofirst,
            'themes' => $themes,
        ]);

    }


    public function syllabu($slug, $mot)
    {


        $themes = $syllabus->themes()->where('status', 1)->with('videos')->get();
        $video = $syllabus->themes()->where('status', 1)->with('videos')->where('slug', $mot)->first();

        return view('syllabus.show', [
            'syllabus' => $syllabus,
            'syllabu' => $syllabu,
            'videofirst' => $videofirst->videos->first(),
            'themes' => $themes,
            'video' => $video,

        ]);
    }
}
