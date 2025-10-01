<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DictionaryResource;
use App\Http\Resources\V1\VideoResource;
use App\Models\VideoTheme;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $signs = VideoTheme::where('active', true)
            ->orderBy('title', 'asc')
            ->get();


        return DictionaryResource::collection($signs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        $video = VideoTheme::where('id', $id)
            ->where('active', true)
            ->get();


        return DictionaryResource::collection($video);
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


}
