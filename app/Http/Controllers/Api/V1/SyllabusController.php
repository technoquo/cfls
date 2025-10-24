<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Syllabu;
use App\Http\Resources\V1\SyllabusResource;
use Illuminate\Http\Request;

class SyllabusController extends Controller
{
    /**
     * Mostrar todos los syllabu
     */
    public function index()
    {
        return SyllabusResource::collection(Syllabu::all());
    }

    /**
     * Guardar un nuevo syllabu
     */
    public function store(Request $request)
    {
        $syllabu = Syllabu::create($request->all());

        return new SyllabusResource($syllabu);
    }

    /**
     * Mostrar un syllabu específico
     */
    public function show($syllabu)
    {

        $syllabu = Syllabu::findOrFail($syllabu);
        return new SyllabusResource($syllabu);
    }

    /**
     * Actualizar un syllabu específico
     */
    public function update(Request $request, Syllabu $syllabu)
    {
        $syllabu->update($request->all());

        return new SyllabusResource($syllabu);
    }

    /**
     * Eliminar un syllabu específico
     */
    public function destroy(Syllabu $syllabu)
    {
        $syllabu->delete();

        return response()->noContent();
    }
}
