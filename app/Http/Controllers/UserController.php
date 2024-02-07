<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

;

class UserController extends Controller
{
    public function index()
    {

        $users = User::with('roles')->get();
        $archived = User::onlyTrashed()->get();
        return view('users.index', ['users' => $users, 'archived' =>  $archived]);
    }

    public function edit(Request $req, $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function destroy(User $user)
    {

        $user->delete();

        session()->flash('success', 'User deleted successfully!');
        return redirect()->route('users.index');
    }
}
