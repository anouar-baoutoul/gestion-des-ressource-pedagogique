@extends('layouts.app')

@section('title', 'Modifier une ressource')

@section('content')
    <h2 class="mb-4">Modifier la ressource</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ressources.update', $ressource) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Type :</label>
            <select name="type" class="form-select">
                @foreach(['Cours','TP','Examen','Corrigé','Autre'] as $type)
                    <option value="{{ $type }}" {{ $ressource->type === $type ? 'selected' : '' }}>
                        {{ $type }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Titre :</label>
            <input type="text" name="title" class="form-control"
                   value="{{ old('title', $ressource->title) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Description :</label>
            <textarea name="description" class="form-control" rows="3">
{{ old('description', $ressource->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Module :</label>
            <select name="module_id" class="form-select">
                @foreach($modules as $module)
                    <option value="{{ $module->id }}"
                        {{ $ressource->module_id == $module->id ? 'selected' : '' }}>
                        {{ $module->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nouveau fichier (optionnel) :</label>
            <input type="file" name="file" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('ressources.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
