<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ThemeResource;
use App\Models\Syllabu;
use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ThemeResource::collection(Theme::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($theme)
    {

        $syllabu = Syllabu::where('slug', $theme)->firstOrFail();

        $themes = Theme::where('syllabu_id', $syllabu->id)->get();

        return ThemeResource::collection($themes);
    }

    public function theme($slugTheme, $slugVideo){


        $themes =  Theme::with('videos')->where('slug', $slugVideo)->firstOrFail();


        return new ThemeResource($themes);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function video($slugTheme, $slugVideo, $id){


        $theme = Theme::where('slug', $slugVideo)->firstOrFail();
        $video = $theme->videos()->where('id', $id)->firstOrFail();
        return response()->json([
            'data' => [
                'type' => 'videos',
                'id' => $video->id,
                'attributes' => [
                    'title' => $video->title,
                    'url' => $video->url
                ]
            ]
        ]);
    }
}
