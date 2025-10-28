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
    public function index(Request $request)
    {
        $letter  = $request->query('letter');
        $search  = $request->query('search');
        $perPage = $request->query('per_page');

        $query = VideoTheme::where('active', true);

        // 🔍 Si hay búsqueda, la letra NO aplica (search domina)
        if ($search) {
            $query->where('title', 'LIKE', "%{$search}%");
        } elseif ($letter) {
            $query->whereRaw("UPPER(SUBSTRING(title, 1, 1)) = ?", [strtoupper($letter)]);
        }

        $query->orderBy('title', 'asc');

        $signs = $perPage ? $query->paginate((int)$perPage) : $query->get();

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
