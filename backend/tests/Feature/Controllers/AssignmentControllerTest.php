<?php

namespace Tests\Feature\Controllers;

use App\Http\Resources\AssignmentResource;
use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Http\Request;
use Tests\TestCase;

class AssignmentControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPublishAssignment()
    {
        $assignment = Assignment::factory()->create([
            'course_id' => Course::firstOrFail()->id,
            'is_published' => false
        ]);

        $this->putJson(route('assignments.publish', $assignment))->assertSuccessful();
        $assignment->refresh();

        $this->assertEquals(true, $assignment->is_published);
    }
}
