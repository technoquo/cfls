<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreSyllabuRequest;
use App\Http\Requests\Api\V1\UpdateSyllabuRequest;
use App\Http\Resources\V1\SyllabuResource;
use App\Models\Syllabu;

class SyllabuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SyllabuResource::collection(Syllabu::all());
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSyllabuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Syllabu $syllabu)
    {
         return new SyllabuResource($syllabu);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSyllabuRequest $request, Syllabu $syllabu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Syllabu $syllabu)
    {
        //
    }
}
