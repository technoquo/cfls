<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\QuestionResource;
use App\Models\Question;
use App\Models\Syllabu;
use App\Models\Theme;
use Illuminate\Http\Request;

class QuizController
{
    public function index()
    {
        $questions = Question::with('video')

//            ->inRandomOrder()
//            ->take(5)
            ->get();

        return response()->json([
            'status' => 'success',
            'data'   => QuestionResource::collection($questions),
        ]);
    }

    public function show($slug,$theme)
    {
        $syllabus = Syllabu::where('slug', $slug)->firstOrFail();
        $questions = Question::with(['theme', 'video'])
            ->whereHas('theme', fn($query) =>
            $query->where('syllabu_id', $syllabus->id)
                   ->where('slug', $theme)
            )
           //->where('type', 'text')
          //  ->inRandomOrder()
            ->get();
        return QuestionResource::collection($questions);
    }

    public function setting(Request $request)
    {
        $syllabus = Syllabu::all();
        $syllabuId = $request->query('syllabu_id', $syllabus->first()?->id ?? 1);

        // ✅ Filtrar themes solo del syllabus seleccionado
        $themes = Theme::where('syllabu_id', $syllabuId)->get();
        $themeId = $request->query('theme_id', $themes->first()?->id ?? 1);

        $questions = Question::with(['video', 'theme', 'syllabus'])
            ->where('syllabu_id', $syllabuId)
            ->where('theme_id', $themeId)
            ->where('type', 'text')
            ->orderBy('answer')
            ->get();

        return view('lsfbgo.questions', compact(
            'syllabus',
            'themes',
            'syllabuId',
            'themeId',
            'questions'
        ));
    }

    public function updateAnswer(Request $request, $id)
    {
        // Validar solo el campo answer
        $validated = $request->validate([
            'answer' => 'required|string|max:255',
        ]);

        try {
            // Buscar la pregunta
            $question = Question::findOrFail($id);

            // Actualizar solo answer
            $question->answer = $validated['answer'];
            $question->save();

            return response()->json([
                'success' => true,
                'message' => 'Réponse mise à jour avec succès',
                'question' => $question
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur: ' . $e->getMessage()
            ], 500);
        }
    }
}
