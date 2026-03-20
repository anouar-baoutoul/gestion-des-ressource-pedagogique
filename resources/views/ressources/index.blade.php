@extends('layouts.app')

@section('title', 'Liste des ressources')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Liste des ressources</h2>
        <a href="{{ route('ressources.create') }}" class="btn btn-primary">
            + Ajouter une ressource
        </a>
    </div>

    @if($ressources->isEmpty())
        <p>Aucune ressource pour le moment.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Titre</th>
                <th>Type</th>
                <th>Module</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ressources as $ressource)
                <tr>
                    <td>{{ $ressource->title }}</td>
                    <td>{{ $ressource->type }}</td>
                    <td>{{ $ressource->module->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('ressources.show', $ressource) }}" class="btn btn-sm btn-info">Voir</a>
                        <a href="{{ route('ressources.edit', $ressource) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('ressources.destroy', $ressource) }}"
                              method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Supprimer cette ressource ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
