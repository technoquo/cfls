<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'slug'          => $this->syllabus->slug ?? '',
            'theme'         => $this->themes ?? '',
            'question_text' => $this->question_text ?? '',
            'type'          => $this->type ?? '',
            'video'         => $this->video->url ?? '', // si tienes relación con video_themes_cloudinary
            'options'       => $this->options ?? [],
            'answer'        => $this->answer ?? '',
        ];
    }
}