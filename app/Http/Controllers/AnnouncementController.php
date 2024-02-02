<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;
use App\Models\Company;
use Illuminate\Http\Request;

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
        $companies = Company::all();
        return view('announcements.create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnnouncementRequest $request)
    {
        if ($request->validated()) {
            // $imagePath = $request->file('image')->store('public/images');

            $announcement = Announcement::create([
                'title' => $request->input('title'),
                'company_id' => $request->input('company_id'),
                'description' => $request->input('description'),
            ]);

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

        return view('announcements.edit', compact('announcement', 'companies'));
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
}
