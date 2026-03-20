<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;


class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('user')->get();

        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $users = User::where('role', 'teacher')->get();

        return view('teachers.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        Teacher::create($data);

        return redirect()->route('teachers.index');
    }

    public function show($id)
    {
        $teacher = Teacher::with('user')->findOrFail($id);

        return view('teachers.show', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $users   = User::where('role', 'teacher')->get();

        return view('teachers.edit', compact('teacher', 'users'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $teacher->update($data);

        return redirect()->route('teachers.index');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index');
    }
}
