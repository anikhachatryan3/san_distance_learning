<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource as JsonJsonResource;

class CourseResource extends JsonJsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'subject_id' => $this->subject_id,
            'subject_name' => $this->subject->name,
            'subject_bg_variant' => $this->subject->bg_variant,
            'subject_img_src' => $this->subject->img_src,
            'teacher_id' => $this->teacher_id,
            'teacher_firstname' => $this->teacher->first_name,
            'teacher_lastname' => $this->teacher->last_name,
            'assignments' => AssignmentResource::collection($this->assignments),
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}