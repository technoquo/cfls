<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MemoryGameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'MemoryGame',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'image_path' => $this->image_path,
                'active' => $this->active,
                'theme' => $this->theme->title,
                'syllabus' => $this->syllabus->title,
            ]
        ];
    }
}
