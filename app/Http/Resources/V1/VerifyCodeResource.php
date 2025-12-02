<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VerifyCodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array

    {
        return [
            'type' => 'verify_code',
            'id' => $this->id,
            'attributes' => [
                'user_id' => $this->user_id,
                'theme' => $this->theme,
                'active' => $this->active,

            ]
        ];
    }

}
