<?php

namespace App\Http\Resources;


use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'image' => "/storage/$this->image",
            'description' => $this->description,
            'user_id' => $this->user_id,
            'sex' => $this->sex,
            'subjects' => SubjectResource::collection($this->whenLoaded('profiles'))
        ];
    }
}
