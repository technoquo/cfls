<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class QuizController
{
    public function index()
    {
        $questions = Question::with(['video', 'answers'])
            ->inRandomOrder()
            ->take(5)
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $questions
        ]);
    }

    // Mostrar una sola pregunta
    public function show($id)
    {
        $question = Question::with(['video', 'answers'])->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $question
        ]);
    }

    // Verificar respuesta enviada
    public function checkAnswer(Request $request)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer_id'   => 'required|exists:answers,id'
        ]);

        $answer = Answer::findOrFail($request->answer_id);
        $isCorrect = $answer->is_correct;



        return response()->json([
            'status' => $isCorrect ? 'success' : 'error',
            'correct_answer' => $answer->question->answers()->where('is_correct', true)->first()
        ]);
    }
}