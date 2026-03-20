<?php

namespace App\Http\Controllers;

use App\Models\ResourceView;
use App\Models\Ressource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResourceViewController extends Controller
{

    public function index(Request $request)
    {
        $ressourceId = $request->query('ressource_id');

        $views = ResourceView::with(['ressource', 'student'])
            ->when($ressourceId, fn ($q) => $q->where('ressource_id', $ressourceId))
            ->latest()
            ->paginate(20);


        return view('resource_views.index', compact('views', 'ressourceId'));


    }


    public function store(Request $request)
    {
        $request->validate([
            'ressource_id' => 'required|exists:ressources,id',
        ]);

        ResourceView::create([
            'ressource_id' => $request->ressource_id,
            'student_id'   => Auth::id(),
            'viewed_at'    => now(),
        ]);


        return response()->noContent();
    }

    public function show(ResourceView $resourceView)
    {
        return view('resource_views.show', compact('resourceView'));


    }


    public function destroy(ResourceView $resourceView)
    {
        $resourceView->delete();

        return redirect()
            ->route('resource-views.index')
            ->with('success', 'Vue supprimée.');
    }
}
