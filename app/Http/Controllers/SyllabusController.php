<?php

namespace App\Http\Controllers;

use App\Models\Syllabu;
use App\Models\VerifyCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SyllabusController extends Controller
{
    /**
     * Slugs válidos que existen en Wix para el redireccionamiento especial.
     */
    private const WIX_VALID_SLUGS = [
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

    /** Lista de syllabus activos. */
    public function index()
    {
        $syllabus = Syllabu::where('status', 1)->get();
        return view('syllabus.index', compact('syllabus'));
    }

    /** Página de un syllabus (lista de temas). */
    public function syllabu(string $slug)
    {

            if ($slug != 'ue1-themes') {   //OJO TEMPORAL POR ESTE MOMENTO USANDO WIX

                if ($redirect = $this->ensureActiveUser()) {
                    return $redirect;
                }
                $user = Auth::user();
                // Exige código válido para ESTE slug
                $exists = VerifyCode::where('user_id', $user->id)->where('theme', $slug)->where('active', 1)->first();
                if (!$exists) {
                    return redirect()->route('code-livre', ['slug' => $slug]);
                }
            }


        // Caso especial Wix
        if (request()->path() === 'ue1-themes' && in_array($slug, self::WIX_VALID_SLUGS, true)) {
            return redirect()->away("https://wix.cfls.be/{$slug}/" . rawurlencode('a-bientôt'));
        }


        $syllabu = Syllabu::where('slug', $slug)->where('status', 1)->firstOrFail();
        $themes  = $syllabu->themes()->where('status', 1)->get();

        return view('syllabus.theme', compact('syllabu', 'slug', 'themes'));
    }

    /** Formulario para ingresar código de libro. */
    public function codelivre(string $slug)
    {
        if ($redirect = $this->ensureLoggedIn()) {
            return $redirect;
        }

        return view('syllabus.codelivre', compact('slug'));
    }

    /** Guarda/valida el código de libro. */
    public function store(Request $request)
    {
        if ($redirect = $this->ensureLoggedIn()) {
            return $redirect;
        }

        $user = Auth::user();

        $data = $request->validate([
            'code_livre' => ['required', 'string'],
            'slug'       => ['required', 'string'],
        ]);

        $slug = $data['slug'];
        $code = $data['code_livre'];

        $verifyCode = VerifyCode::where('code', $code)
            ->where('active', 0)
            ->first();

        if (!$verifyCode) {
            return back()
                ->withErrors(['error' => 'Code de livre invalide'])
                ->withInput(['slug' => $slug]);
        }

        VerifyCode::updateOrCreate(
            ['code' => $code],
            [
                'user_id'=> $user->id,
                'active' => 1,
                'theme'  => $slug,
            ]
        );

        return redirect()->route('syllabus.slug', ['slug' => $slug]);
    }

    /** Página de un tema específico del syllabus. */
    public function theme(string $slug, string $theme, ?string $code = null)
    {

       

        // Caso especial Wix
        if (request()->segment(2) === 'a-bientôt' && in_array($slug, self::WIX_VALID_SLUGS, true)) {
            return redirect()->away("https://wix.cfls.be/{$slug}/a-bient%C3%B4t");
        }

        if ($slug != 'ue1-themes') {  //OJO TEMPORAL POR ESTE MOMENTO USANDO WIX
            if ($redirect = $this->ensureActiveUser()) {
                return $redirect;
            }

            $user = Auth::user();

            // Exige código válido para ESTE slug
            $exists = VerifyCode::where('user_id', $user->id)->where('theme', $slug)->where('active', 1)->first();

            if (!$exists) {
                return redirect()->route('code-livre', ['slug' => $slug]);
            }
        }




        $syllabu = Syllabu::where('slug', $slug)->where('status', 1)->firstOrFail();

        $themeModel = $syllabu->themes()
            ->where('slug', $theme)
            ->where('status', 1)
            ->firstOrFail();

        $videos = DB::table('video_themes_cloudinary')
            ->select('id','url as url_video', 'title')
            ->where('syllabu_id', $syllabu->id)
            ->where('theme_id', $themeModel->id)
            ->where('active', 1)
            ->orderBy('title', 'asc')
            ->get()
            ->map(fn ($item) => (array) $item)
            ->toArray();



        return view('syllabus.show', compact('syllabu', 'themeModel', 'videos'));
    }

    /* ======================== helpers ======================== */

    private function ensureLoggedIn()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return null;
    }

    private function ensureActiveUser()
    {
        if ($redirect = $this->ensureLoggedIn()) {
            return $redirect;
        }

        $user = Auth::user();
        if ((int) ($user->is_active ?? 0) !== 1) {
            return redirect()->route('verification.notice');
        }
        return null;
    }
}
