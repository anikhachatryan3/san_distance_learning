<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource as JsonJsonResource;

class UserResource extends JsonJsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'role_id' => $this->roles->first()->id,
            'role_name' => $this->roles->first()->role,
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}