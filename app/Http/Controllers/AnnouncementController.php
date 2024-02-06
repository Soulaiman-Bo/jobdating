<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;
use App\Models\Company;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $announcements = Announcement::latest()->paginate(10);
        return view('announcements.index', ['announcements' => $announcements]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();
        $companies = Company::all();
        return view('announcements.create', ['companies' => $companies, 'skills' => $skills]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnnouncementRequest $request)
    {
        if ($request->validated()) {

            $announcement = Announcement::create([
                'title' => $request->input('title'),
                'company_id' => $request->input('company_id'),
                'description' => $request->input('description'),
            ]);

            $skills = $request->input('skills');
            $announcement->skills()->attach($skills);

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $announcement->addMediaFromRequest('image')->toMediaCollection('images');
            }

            return redirect()->route('announcements.index')->with("success", 'Created Successfully');
        } else {
            return redirect()->back()->withInput()->withErrors($request->errors());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {

        $announcement = Announcement::findOrFail($id);
        $companies = Company::all();

        $ownskills = Announcement::find($id)->skills->map(function ($skill) {
            return ['id' => $skill->id, 'name' => $skill->name];
        })->toArray();


        $skills = Skill::whereNotIn('id', array_column($ownskills, 'id'))->get();

        return view('announcements.edit', compact('announcement', 'companies',  'ownskills', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnnouncementRequest $request, Announcement $announcement)
    {
        if ($request->validated()) {
            $announcement->update($request->only([
                'title',
                'company_id',
                'description',
            ]));

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                if ($announcement->logo) {
                    $announcement->logo->updateMedia([
                        'media' => $request->file('image'),
                    ]);
                } else {
                    $announcement->addMediaFromRequest('image')->toMediaCollection('images');
                }
            }

            session()->flash('success', 'announcement updated successfully!');
            return redirect()->route('announcements.index', $announcement->id);
        } else {
            return redirect()->back()->withInput()->withErrors($request->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        session()->flash('success', 'Announcement deleted successfully!');
        return redirect()->route('announcements.index');
    }

    public function addSkillsToAnnouncements(Request $request, $announcement_id)
    {
        $request->validate([
            'skills' => ['required', 'array',],
        ]);

        $skills = $request->input('skills');
        $announcement = Announcement::find($announcement_id);

        $existingSkillIds = $announcement->skills->pluck('id')->toArray();

        $newSkills = Skill::whereIn('id', $skills)
        ->whereNotIn('id', $existingSkillIds)
        ->get();

        $announcement->skills()->attach($newSkills);

        return redirect()->route('announcements.edit', [$announcement_id])->with("success", 'Skills added successfully');

    }
}
