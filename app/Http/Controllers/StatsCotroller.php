<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsCotroller extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalAnnouncements = Announcement::count();
        $totalCompany = Company::count();
        $totalApplications = DB::table('announcement_user')->count();

        return view('dashboard', [
            'totalUsers' => $totalUsers,
            'totalAnnouncements' => $totalAnnouncements,
            'totalCompany' => $totalCompany,
            'totalApplications' => $totalApplications
        ]);
    }
}
