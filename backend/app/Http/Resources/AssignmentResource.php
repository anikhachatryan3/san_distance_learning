<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource as JsonJsonResource;

class AssignmentResource extends JsonJsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'points' => $this->points,
            'is_published' => $this->is_published,
            'course_id' => $this->course->id,
            'course_name' => $this->course->name,
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}