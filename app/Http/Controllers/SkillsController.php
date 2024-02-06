<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSkillRequest;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function index()
    {
        $skills = Skill::latest()->paginate(10);
        return view('skills.index', ['skills' => $skills]);
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(StoreSkillRequest $request)
    {
        if ($request->validated()) {
            $skill = Skill::create([
                'name' => $request->input('name'),
            ]);

            return redirect()->route('skills.index')->with("success", 'Created Successfully');
        } else {
            return redirect()->back()->withInput()->withErrors($request->errors());
        }
    }

    public function addSkillsToUser(Request $request, $user_id)
    {
        $request->validate([
            'skills' => ['required', 'array',],
        ]);

        $tags = $request->input('skills');
        $user = User::find($user_id);

        $existingSkillIds = $user->skills->pluck('id')->toArray();

        $newSkills = Skill::whereIn('id', $tags)
            ->whereNotIn('id', $existingSkillIds)
            ->get();

        $user->skills()->attach($newSkills);

        return redirect()->route('profile.edit')->with("success", 'Skills added successfully');
    }
}
