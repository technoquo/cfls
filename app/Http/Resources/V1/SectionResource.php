<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'section',
            'id' => $this->id,
            'attributes' => [
                "name" => $this->name,
                "type" => $this->type,
                "name_syllabu" => $this->name_syllabu,
                "active" => $this->active,
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at,
            ]
        ];
    }
}
