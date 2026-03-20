<?php


namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Ressource;

class RessourceController extends Controller
{
    // Liste des ressources
    public function index()
    {
        $ressources = Ressource::with('module', 'teacher')->get();

        return view('ressources.index', compact('ressources'));
    }

    // Formulaire d'ajout
    public function create()
    {
        $modules = Module::all();

        return view('ressources.create', compact('modules'));
    }

    // Enregistrement d'une nouvelle ressource
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'type'        => 'required|string',
            'description' => 'nullable|string',
            'file'        => 'required|file|mimes:pdf,doc,docx,ppt,pptx,zip|max:20480',
            'module_id'   => 'required|exists:modules,id',
        ]);

        // upload fichier
        $path = $request->file('file')->store('ressources', 'public');

        Ressource::create([
            'title'       => $data['title'],
            'type'        => $data['type'],
            'description' => $data['description'] ?? null,
            'file_path'   => $path,
            'module_id'   => $data['module_id'],
            'teacher_id'  => Auth::id(), // enseignant connecté
        ]);

        return redirect()->route('ressources.index');
    }

    // Affichage d'une ressource
    public function show($id)
    {
        $ressource = Ressource::with('module', 'teacher')->findOrFail($id);

        return view('ressources.show', compact('ressource'));
    }

    // Formulaire d'édition
    public function edit($id)
    {
        $ressource = Ressource::findOrFail($id);
        $modules   = Module::all();

        return view('ressources.edit', compact('ressource', 'modules'));
    }

    // Mise à jour
    public function update(Request $request, $id)
    {
        $ressource = Ressource::findOrFail($id);

        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'type'        => 'required|string',
            'description' => 'nullable|string',
            'file'        => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,zip|max:20480',
            'module_id'   => 'required|exists:modules,id',
        ]);

        if ($request->hasFile('file')) {
            // optionnel : supprimer l'ancien fichier
            if ($ressource->file_path) {
                Storage::disk('public')->delete($ressource->file_path);
            }

            $data['file_path'] = $request->file('file')->store('ressources', 'public');
        }

        $ressource->update($data);

        return redirect()->route('ressources.index');
    }

    // Suppression
    public function destroy($id)
    {
        $ressource = Ressource::findOrFail($id);

        if ($ressource->file_path) {
            Storage::disk('public')->delete($ressource->file_path);
        }

        $ressource->delete();

        return redirect()->route('ressources.index');
    }
}
