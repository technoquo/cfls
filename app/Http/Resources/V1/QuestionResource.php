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
            'theme'         => $this->theme->title ?? '',
            'question_text' => $this->question_text ?? '',
            'type'          => $this->type ?? '',
            'video'         => isset($this->video->url)
                ? urldecode(pathinfo($this->video->url, PATHINFO_FILENAME))
                : null,
            'options'       => $this->formatOptions(),
            'answer'        => $this->answer ?? '',
        ];
    }

    private function formatOptions()
    {
        // Normalizar en caso de que venga en string JSON
        $options = is_array($this->options)
            ? $this->options
            : json_decode($this->options, true);

        if ($this->type === 'choice') {
            return $options;
        }

        // Si es un tipo que tiene video dentro de cada opción
        return collect($options)->map(function ($option) {
            if (isset($option['video'])) {
                $option['video'] = urldecode(pathinfo($option['video'], PATHINFO_FILENAME));
            }
            return $option;
        })->toArray();
    }
}