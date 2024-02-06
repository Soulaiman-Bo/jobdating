<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $userId = Auth::id();

        $userSkills =   User::find($userId)->skills->pluck('id');

        $announcements = Announcement::all();
        $filteredAnnouncements = [];

        foreach ($announcements as $announcement) {
            $announcementSkills = $announcement->skills()->pluck('skills.id');
            // Calculate the intersection of user skills and announcement skills
            $sharedSkills = $userSkills->intersect($announcementSkills);

            $percentageShared = $sharedSkills->count() / $userSkills->count() * 100;

            if ($percentageShared >= 50) {
                $announcement->percentageSharedSkills = $percentageShared;
                $filteredAnnouncements[] = $announcement;
            }
        }
        return view('home', ['announcements' => $filteredAnnouncements]);
    }
}
