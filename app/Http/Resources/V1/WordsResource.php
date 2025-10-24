<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WordsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'Word',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'video' => $this->videoThemeCloudinary->url ?? null,
            ]
        ];
    }
}
