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
        return view('syllabus.index', [
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

        return view('syllabus.theme', compact('syllabu', 'slug', 'themes'));
    }

    public function theme($slug, $theme)
    {

        if ($theme == 'a-bientôt') {
            $validSlugs = [
                'ue1-themes',
                'ue1-themes-1',
                'ue1-themes-3',
                'ue1-themes-4',
                'ue1-themes-5',
                'ue1-themes-6',
                'ue1-themes-7',
                'ue1-themes-8',
                'ue1-themes-9',
                'ue1-themes-10',
                'ue1-themes-11',

            ];

            if (in_array($slug, $validSlugs)) {

                return redirect()->away("https://wix.cfls.be/{$slug}/a-bient%C3%B4t");
            }
        } else {

            $syllabu = Syllabu::where('slug', $slug)
                ->where('status', 1)
                ->first();


            if (!$syllabu) {
                abort(404, 'Syllabus no encontrado');
            }

            $themeModel = $syllabu->themes()
                ->where('slug', $theme)
                ->where('status', 1)
                ->first();

            if (!$themeModel) {
                abort(404, 'Tema no encontrado');
            }




            $videos = DB::table('video_themes_cloudinary')
                ->select('url as url_video', 'title')
                ->where('syllabu_id', $syllabu->id)
                ->where('theme_id', $themeModel->id)
                ->orderBy('title', 'asc')
                ->get()
                ->map(function ($item) {
                    return (array)$item;
                })
                ->toArray();

            return view('syllabus.show', compact('syllabu', 'themeModel', 'themeModel', 'videos'));
        }
    }


}





