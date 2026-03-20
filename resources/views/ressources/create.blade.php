@extends('layouts.app')

@section('title', 'Ajouter une ressource')

@section('content')
    <h2 class="mb-4">Ajouter une nouvelle ressource</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ressources.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Type :</label>
            <select name="type" class="form-select">
                <option value="Cours">Cours</option>
                <option value="TP">TP</option>
                <option value="Examen">Examen</option>
                <option value="Corrigé">Corrigé</option>
                <option value="Autre">Autre</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Titre :</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Description :</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Fichier :</label>
            <input type="file" name="file" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Module :</label>
            <select name="module_id" class="form-select">
                @foreach($modules as $module)
                    <option value="{{ $module->id }}">{{ $module->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('ressources.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
