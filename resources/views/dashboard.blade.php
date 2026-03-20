@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mb-3">Tableau de bord</h1>

    <p>Bienvenue sur la plateforme de ressources pédagogiques.</p>

    <div class="mt-3">
        <a href="{{ route('ressources.index') }}" class="btn btn-primary">
            Voir les ressources
        </a>
        <a href="{{ route('ressources.create') }}" class="btn btn-success">
            Ajouter une ressource
        </a>
    </div>
@endsection
