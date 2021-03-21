<?php

namespace Tests\Feature\Controllers;

use App\Http\Resources\AnnouncementResource;
use App\Models\Announcement;
use App\Models\Course;
use App\Models\User;
use Tests\TestCase;

class AnnouncementControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateAnnouncement() {
        $announcementsCount = Announcement::all()->count();

        $user = User::firstOrFail();
        $course = Course::firstOrFail();
        $this->postJson(route('announcements.create', [
            'user_id' => $user->id,
            'course_id' => $course->id,
            'title' => 'Hello',
            'announcement' => 'Hello there.',
        ]))->assertSuccessful();
        $this->assertEquals($announcementsCount+1, Announcement::all()->count());
        $this->assertDatabaseHas('announcements', [
            'user_id' => $user->id,
            'course_id' => $course->id,
            'title' => 'Hello',
            'announcement' => 'Hello there.',
        ]);
    }

    public function testShow() {
        $announcement = Announcement::factory()->create([
            'user_id' => User::firstOrFail()->id,
            'course_id' => Course::firstOrFail()->id,
            'title' => 'Hello',
            'announcement' => 'First announcement',
        ]);
        $this->getJson(route('announcements.show', [
            'announcement' => $announcement->id,
        ]))->assertSuccessful()->assertJsonFragment([
            'id' => $announcement->id,
            'user_id' => $announcement->user_id,
            'course_id' => $announcement->course_id,
            'title' => $announcement->title,
            'announcement' => $announcement->announcement,
        ]);
    }

    public function testIndex() {
        $announcement = Announcement::factory()->create([
            'user_id' => User::firstOrFail()->id,
            'course_id' => Course::firstOrFail()->id,
            'title' => 'Hello',
            'announcement' => 'First announcement',
        ]);
        $this->getJson(route('announcements.index'))->assertSuccessful()->assertJsonFragment([
            'id' => $announcement->id,
            'user_id' => $announcement->user_id,
            'course_id' => $announcement->course_id,
            'title' => $announcement->title,
            'announcement' => $announcement->announcement,
        ]);
    }

    public function testDelete() {
        $announcement = Announcement::factory()->create([
            'user_id' => User::firstOrFail()->id,
            'course_id' => Course::firstOrFail()->id,
            'title' => 'Hello',
            'announcement' => 'First announcement',
        ]);
        $this->deleteJson(route('announcements.delete', [
            'announcement' => $announcement->id,
        ]))->assertSuccessful();
    }
}
