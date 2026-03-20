<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class RessourceStatController extends Controller
{
    // stats pour l'enseignant connecté
    public function mesRessources()
    {
        $user = Auth::user();

        $ressources = Ressource::where('teacher_id', $user->id)
            ->withCount('downloads')
            ->get();

        $stats = [
        'total' => 0,
        'downloads' => 0,
    ];

        return view('stats.mes_ressources', compact('ressources', 'stats'));
    }

    // stats globales admin
    public function global()
    {
        $byType = Ressource::select('type', DB::raw('count(*) as total'))
            ->groupBy('type')
            ->get();

        $stats = [
        'total' => 0,
        'downloads' => 0,
        'top_module' => null,
    ];
    return view('stats.global', compact('byType', 'stats'));
    }
}
