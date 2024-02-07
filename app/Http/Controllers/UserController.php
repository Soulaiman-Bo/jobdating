<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $users = User::with('roles')->get();

        $archived = User::onlyTrashed()->get();

        return view('users.index', ['users' => $users, 'archived' =>  $archived]);

    }

    public function destroy(User $user){

        $user->delete();

        session()->flash('success', 'User deleted successfully!');
        return redirect()->route('users.index');

    }
}
