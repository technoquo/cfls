<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'plans',
            'id' => $this->id,
            'attributes' => [
                'name'       => $this->name,
                'slug'       => $this->slug,
                'price'      => $this->price,
                'currency'   => $this->currency,
                'duration_days'   => $this->duration_days,
                'description' => $this->description,
                'created_at' => $this->created_at?->format('Y-m-d'), // formato limpio
                'updated_at' => $this->updated_at?->format('Y-m-d'), // formato limpio
            ]
        ];
    }
}
