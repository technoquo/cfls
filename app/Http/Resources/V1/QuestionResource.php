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
            'video'         => isset($this->video->url)
                ? urldecode(pathinfo($this->video->url, PATHINFO_FILENAME))
                : null,
            'options' => collect($this->options ?? [])->map(function ($option) {
                if (isset($option['video'])) {
                    $option['video'] = urldecode(pathinfo($option['video'], PATHINFO_FILENAME));
                }
                return $option;
            })->toArray(),
            'answer'        => $this->answer ?? '',
        ];
    }
}