<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;


class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();

        return view('groupe.index', compact('groups'));
    }

    public function create()
    {
        return view('groupe.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255', // ex: CP2-G5
        ]);

        Group::create($data);

        return redirect()->route('groups.index');
    }

    public function show($id)
    {
        $group = Group::findOrFail($id);

        return view('groupe.show', compact('group'));
    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);

        return view('groupe.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $group = Group::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $group->update($data);

        return redirect()->route('groups.index');
    }

    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('groups.index');
    }
}
