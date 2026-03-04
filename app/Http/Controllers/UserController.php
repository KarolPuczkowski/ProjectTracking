<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('team')->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $teams = Team::all();
        $roles = ['admin', 'developer', 'viewer', 'member'];
        return view('users.create', compact('teams', 'roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|string',
            'team_id' => 'nullable|exists:teams,id',
            'password' => 'nullable|string|min:6',
        ]);

        if (!isset($data['password'])) {
            $data['password'] = Hash::make(uniqid('pass_', true)); // random password
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        User::create($data);

        return redirect()->route('users.index')->with('success', 'User created.');
    }

    public function edit(User $user)
    {
        $teams = Team::all();
        $roles = ['admin', 'developer', 'viewer', 'member'];
        return view('users.edit', compact('user', 'teams', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string',
            'team_id' => 'nullable|exists:teams,id',
            'password' => 'nullable|string|min:6',
        ]);

        if ($data['password'] ?? false) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted.');
    }
}