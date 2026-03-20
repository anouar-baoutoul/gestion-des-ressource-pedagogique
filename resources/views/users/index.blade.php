@extends('layouts.app')

@section('title', 'Utilisateurs')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Liste des utilisateurs</h2>
        <a href="{{ route('users.create') }}" class="btn btn-primary">+ Ajouter un utilisateur</a>
    </div>

    @if($users->isEmpty())
        <p>Aucun utilisateur.</p>
    @else
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('users.destroy', $user) }}"
                              method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Supprimer cet utilisateur ?')">
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
