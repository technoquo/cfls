<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
           'type' => 'users',
           'id' => $this->id,
           'attributes' => [
               'name' => $this->name,
               'email' => $this->email,
               'subscriptions' => SubscritpionResource::collection(
                   $this->whenLoaded('subscriptions')
               ),
               $this->mergeWhen($request->routeIs('users.*'), [
                   'role' => $this->role,
                   'email_verified_at' => $this->email_verified_at,
                   'created_at' => $this->created_at,
                   'updated_at' => $this->updated_at,
                      ])
               ]
             ];
    }
}
