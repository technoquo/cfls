<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoQuizItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'video_quiz_cloudinary_id' => $this->videoThemeCloudinary->url ?? null,
            'question' => $this->question,
            'options' => $this->options,
            'correct_answer' => $this->correct_answer,
            'active' => $this->active,
            'syllabu_id' => $this->syllabu_id,
            'theme_id' => $this->theme_id,
        ];



    }
}
