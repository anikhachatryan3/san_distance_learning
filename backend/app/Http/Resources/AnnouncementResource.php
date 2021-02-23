<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource as JsonJsonResource;

class AnnouncementResource extends JsonJsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            'course_id' => $this->course_id,
            'course_name' => $this->course->name,
            'title' => $this->title,
            'announcement' => $this->announcement,
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}