@extends('layouts.app')

@section('title', 'Détail ressource')

@section('content')
    <h2 class="mb-3">{{ $ressource->title }}</h2>

    <p><strong>Type :</strong> {{ $ressource->type }}</p>
    <p><strong>Module :</strong> {{ $ressource->module->name ?? '-' }}</p>
    <p><strong>Description :</strong></p>
    <p>{{ $ressource->description ?? 'Aucune description.' }}</p>

    @if($ressource->file_path)
        <a href="{{ route('ressources.download', $ressource) }}" class="btn btn-success">
            Télécharger le fichier
        </a>
    @endif

    <a href="{{ route('ressources.index') }}" class="btn btn-secondary mt-2">Retour</a>
@endsection
