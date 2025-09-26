<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\QuestionResource;
use App\Models\Question;
use App\Models\Syllabu;

class QuizController
{
    public function index()
    {
        $questions = Question::with('video')
            ->inRandomOrder()
            ->take(5)
            ->get();

        return response()->json([
            'status' => 'success',
            'data'   => QuestionResource::collection($questions),
        ]);
    }

    public function show($slug)
    {
        $questions = Question::with('syllabus')
            ->whereHas('syllabus', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->get(); // 🔹 trae varias

        return QuestionResource::collection($questions);
    }
}
