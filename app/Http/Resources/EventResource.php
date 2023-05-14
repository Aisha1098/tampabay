<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'is_featured' => $this->is_featured,
            'start_at' => $this->start_at,
            'name' => $this->name,
            'location' => $this->location,
            'desc' => $this->desc,
            'faqs' => FaqResource::collection($this->whenLoaded('faqs')),
            'groups' => GroupResource::collection($this->whenLoaded('groups'))
        ];
    }
}
