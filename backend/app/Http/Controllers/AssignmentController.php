<?php

namespace App\Http\Controllers;

use App\Http\Resources\AssignmentResource;
use App\Models\Assignment;

class AssignmentController extends Controller
{
    public function publishAssignment(Assignment $assignment)
    {
        $assignment->is_published = true;
        $assignment->save();
        return new AssignmentResource($assignment);
    }

    public function show(Assignment $assignment) {
        return new AssignmentResource($assignment);
    }
}
