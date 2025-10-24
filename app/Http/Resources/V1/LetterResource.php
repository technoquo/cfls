<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LetterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'Letter',
            'id' => $this->id,
            'attributes' => [
                'symbol' => $this->symbol,
                'image' => asset($this->image),
        ]
        ];
    }
}
