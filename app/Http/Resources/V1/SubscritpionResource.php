<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscritpionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'subscriptions',
            'id' => $this->id,
            'attributes' => [
                'plan_id'  => $this->id,
                'price'      => $this->price,
                'currency'   => $this->currency,
                'duration_days'   => $this->duration_days,
                'starts_at' => $this->starts_at?->format('Y-m-d'), // formato limpio
                'ends_at' => $this->ends_at?->format('Y-m-d'), // formato limpio
                'status'     => $this->status,
                'user_id'    => $this->user_id,
                'created_at' => $this->created_at?->format('Y-m-d'), // formato limpio
                'updated_at' => $this->updated_at?->format('Y-m-d'), // formato limpio
            ]
        ];
    }
}
