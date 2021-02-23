<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnnouncementResource;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function createAnnouncement(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'title' => 'required',
            'announcement' => 'required',
        ]);
        
        $announcement = new Announcement;
        $announcement->user_id = $request->user_id;
        $announcement->course_id = $request->course_id;
        $announcement->title = $request->title;
        $announcement->announcement = $request->announcement;
        $announcement->save();
        
        return new AnnouncementResource($announcement);
    }

    public function show(Announcement $announcement) {
        return new AnnouncementResource($announcement);
    }

    public function index() {
        $announcements = Announcement::all();
        return AnnouncementResource::collection($announcements);
    }
}
