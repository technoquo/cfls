<?php

namespace App\Http\Controllers;

use App\Models\Syllabu;
use App\Models\Theme;
use App\Models\User;
use App\Models\VerifyCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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



        if (Auth::check()) {
            $user = Auth::user();


            if ($user->is_active == 0) {
                return redirect()->route('verification.notice');
            }

            $bookCode = $user->bookCodes()
                ->where('code_livre', '!=', null)
                ->where('user_id', $user->id)
                ->first();

            if (!$bookCode) {
                return redirect()->route('code-livre', ['slug' => $slug]);

            }

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

        } else {
            return redirect()->route('login');
        }




    }

    public function codelivre($slug){


        if (Auth::check()) {
            $user = Auth::user();


            $bookCode = $user->bookCodes()
                ->where('code_livre', '!=', null)
                ->first();


            if (!$bookCode) {
                return view('syllabus.codelivre', [
                    'slug' => $slug,
                ]);
            } else {
                return route('syllabus.slug', ['slug' => $slug]);
            }


        } else {
            return redirect()->route('login');
        }


    }

    public function store()
    {

        if (Auth::check()) {
            $user = Auth::user();

            $codeLivre = request()->input('code_livre');
            $themes = VerifyCode::where('theme', request()->input('slug'))->first();

            $verifyCode = VerifyCode::where('code', $codeLivre)
                ->where('theme', $themes->theme)
                ->where('active', 1)
                ->first();


            if (!$verifyCode) {


                return redirect()
                    ->back() // o ->route('code-livre.form') si tienes una ruta GET del formulario
                    ->withErrors(['error' => 'Code de livre invalide'])
                    ->withInput(['slug' => $themes->theme]); // <-- mantiene el valor
            }

            $user->bookCodes()
                ->updateOrCreate(
                    ['user_id' => $user->id, 'code_livre' => $codeLivre]
                );

            return redirect()
                ->route('syllabus.slug', ['slug' => $themes->theme]);
        }
    }

    public function theme($slug, $theme, $code = null)
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        } else {
            $user = Auth::user();

            if ($user->is_active == 0) {
                return redirect()->route('verification.notice');
            }

            $bookCode = $user->bookCodes()
                ->where('code_livre', '!=', null)
                ->where('user_id', $user->id)
                ->first();

            if (!$bookCode) {
                return redirect()->route('code-livre', ['slug' => $slug]);
            }
        }



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





