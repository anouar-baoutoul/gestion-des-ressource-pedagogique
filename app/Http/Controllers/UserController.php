<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function index()
    {
       $users = User::all();
       return view('users.index', compact('users'));
    }

    public function create()
    {
        $levels = Level::all();
        $groups = Group::all();

        return view('users.create', compact('levels', 'groups'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role'     => 'required|in:admin,teacher,student',
            'level_id' => 'nullable|exists:levels,id',
            'group_id' => 'nullable|exists:groups,id',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::with('level', 'group')->findOrFail($id);

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user   = User::findOrFail($id);
        $levels = Level::all();
        $groups = Group::all();

        return view('users.edit', compact('user', 'levels', 'groups'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8',
            'role'     => 'required|in:admin,teacher,student',
            'level_id' => 'nullable|exists:levels,id',
            'group_id' => 'nullable|exists:groups,id',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
