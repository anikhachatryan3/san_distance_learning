<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource as JsonJsonResource;

class AssignmentResource extends JsonJsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'course_id' => $this->course->id,
            'course_name' => $this->course->name,
            'name' => $this->name,
            'num_problems' => $this->num_problems,
            'total_points' => $this->total_points,
            'range_min' => $this->range_min,
            'range_max' => $this->range_max,
            'is_published' => $this->is_published,
            'english_problems' => EnglishProblemResource::collection($this->englishProblems),
            'math_problems' => MathProblemResource::collection($this->mathProblems),
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}