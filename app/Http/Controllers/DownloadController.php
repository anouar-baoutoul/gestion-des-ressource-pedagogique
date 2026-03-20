<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Ressource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class DownloadController extends Controller
{
    // Enregistrer un téléchargement et renvoyer le fichier
    public function store($id)
    {
        // 1. Récupérer la ressource
        $ressource = Ressource::findOrFail($id);

        Download::create([
            'ressource_id'  => $ressource->id,
            'user_id'       => Auth::id(),
            'downloaded_at' => now(),
        ]);


        if ($ressource->file_path && Storage::disk('public')->exists($ressource->file_path)) {
            $path = Storage::disk('public')->path($ressource->file_path);
            return response()->download($path);
        }


        return redirect()->back()->with('error', 'Fichier introuvable.');
    }
}
