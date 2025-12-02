<?php

namespace App\Http\Resources\V1;

use App\Models\VideoTheme;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SyllabusResource extends JsonResource
{
   // public static $wrap = 'syllabu';

    public function toArray(Request $request): array
    {
        return [
            'type' => 'syllabu',
            'id' => $this->id,
            'attributes' =>[
                "title" => $this->title,
                "slug" =>  $this->slug,
                "image" => asset('storage/' . $this->image),
                "link" => $this->link,
                "status" => $this->status,
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at,
            ],
//            'relationships' => [
//                'Videos' => 'Todpos los videos del syllabus',
//            ],
//            'links' => [
//                'self' => route('syllabus.show', $this->id),
//            ],
        ];
    }
}
