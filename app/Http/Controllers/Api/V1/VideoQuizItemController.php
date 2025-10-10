<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\VideoQuizItemResource;
use App\Models\Syllabu;
use App\Models\Theme;
use App\Models\VideoQuizItem;
use Illuminate\Http\Request;

class VideoQuizItemController extends Controller
{
    public function index($syllabu = null, $theme = null, $id = null)
    {

        $theme = Theme::where('slug', $theme)->first();

        $syllabus = Syllabu::where('slug', $syllabu)->first();


        $video_item_quiz = VideoQuizItem::where('id', (int) $id)
            ->where('theme_id', $theme->id)
            ->where('syllabu_id', $syllabus->id)
            ->whereActive(true)
            ->get();


        return  VideoQuizItemResource::collection($video_item_quiz);

    }
}
