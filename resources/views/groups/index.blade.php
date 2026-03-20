@extends('layouts.app')

@section('title', 'Groupes')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Liste des groupes</h2>
        <a href="{{ route('groups.create') }}" class="btn btn-primary">+ Ajouter un groupe</a>
    </div>

    @if($groups->isEmpty())
        <p>Aucun groupe.</p>
    @else
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->name }}</td>
                    <td>
                        <a href="{{ route('groups.edit', $group) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('groups.destroy', $group) }}"
                              method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Supprimer ce groupe ?')">
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
