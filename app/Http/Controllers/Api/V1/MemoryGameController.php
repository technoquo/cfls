<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\MemoryGameResource;
use App\Models\Card;
use App\Models\Syllabu;
use App\Models\Theme;
use Illuminate\Http\Request;

class MemoryGameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($syllabu = null, $theme = null,)
    {
        $theme = Theme::where('slug', $theme)->first();
        $syllabu = Syllabu::where('slug', $syllabu)->first();


        $memorygame = Card::query()
            ->where('active', true)
            ->with(['theme', 'syllabus'])
            ->when($syllabu->id, fn($query) => $query->where('syllabu_id', $syllabu->id))
            ->when($theme->id, fn($query) => $query->where('theme_id', $theme->id))
            ->orderBy('name')
            ->get();




        return MemoryGameResource::collection($memorygame);
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
