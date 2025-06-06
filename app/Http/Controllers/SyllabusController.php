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


        $redirects = [
            'ue1-themes' => [
                'je-me-presente' => 'https://wix.cfls.be/ue1-themes-1/a-bientôt',
                'ma-famille' => 'https://wix.cfls.be/ue1-themes-3/a-bientôt',
                'jhabite' => 'https://wix.cfls.be/ue1-themes-4/a-bientôt',
                'je-me-deplace' => 'https://wix.cfls.be/ue1-themes-5/a-bientôt',
                'quel-jour-sommes-nous' => 'https://wix.cfls.be/ue1-themes-6/a-bientôt',
                'ma-routine' => 'https://wix.cfls.be/ue1-themes-7/a-bientôt',
                'quel-temps-fait-il' => 'https://wix.cfls.be/ue1-themes-8/a-bientôt',
                'chez-le-medecin' => 'https://wix.cfls.be/ue1-themes-9/a-bientôt',
                'je-decouvre-mes-sentiments' => 'https://wix.cfls.be/ue1-themes-10/a-bientôt',
                'au-restaurant' => 'https://wix.cfls.be/ue1-themes-11/a-bientôt',
            ],
        ];
        if (isset($redirects[$slug][$theme])) {
            return redirect()->away($redirects[$slug][$theme]);
        }


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
