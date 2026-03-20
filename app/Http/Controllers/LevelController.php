<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;


class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::all();

        return view('levels.index', compact('levels'));
    }

    public function create()
    {
        return view('levels.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Level::create($data);

        return redirect()->route('levels.index');
    }

    public function show($id)
    {
        $level = Level::findOrFail($id);

        return view('levels.show', compact('level'));
    }

    public function edit($id)
    {
        $level = Level::findOrFail($id);

        return view('levels.edit', compact('level'));
    }

    public function update(Request $request, $id)
    {
        $level = Level::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $level->update($data);

        return redirect()->route('levels.index');
    }

    public function destroy($id)
    {
        $level = Level::findOrFail($id);
        $level->delete();

        return redirect()->route('levels.index');
    }
}
