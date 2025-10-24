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
    public function index($syllabu = null, $theme = null)
    {
        $theme = Theme::where('slug', $theme)->firstOrFail();
        $syllabus = Syllabu::where('slug', $syllabu)->firstOrFail();

        $videos = VideoQuizItem::where('theme_id', $theme->id)
            ->where('syllabu_id', $syllabus->id)
            ->whereActive(true)
            ->inRandomOrder()
            ->get();

        $count = $videos->count();

        return response()->json([
            'count' => $count,
            'videos' => VideoQuizItemResource::collection($videos),
        ]);
    }
}
