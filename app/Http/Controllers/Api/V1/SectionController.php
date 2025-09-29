<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\SectionResource;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug = null)
    {
        $sections = Section::where('name_syllabu', $slug)->get();
        return SectionResource::collection($sections);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $section = Section::create($request->all());

        return new SectionResource($section);
    }

    /**
     * Display the specified resource.
     */
    public function show($section)
    {
        $sections = Section::where('name_syllabu', $section)->get();

        return SectionResource::collection($sections);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $section->update($request->all());

        return new SectionResource($section);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();

        return response()->noContent();
    }
}
