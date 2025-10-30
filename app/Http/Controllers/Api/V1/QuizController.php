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
          //  ->inRandomOrder()
            ->get();

        return QuestionResource::collection($questions);
    }
}
