@extends('layouts.app')

@section('content')
    <div class="edit">
        @vite(['resources/css/editoffer.css',]);
        <h1 class="title">Modifier l'Offre de Stage</h1>
        <form action="{{ route('offers.update', ['id' => $offer->id]) }}" method="POST" class="edit-form">

            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Titre:</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $offer->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" required>{{ $offer->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="requirements">Exigences:</label>
                <textarea id="requirements" name="requirements" class="form-control" required>{{ $offer->requirements }}</textarea>
            </div>
            <div class="form-group">
                <label for="location">Lieu:</label>
                <input type="text" id="location" name="location" class="form-control" value="{{ $offer->location }}" required>
            </div>
            <div class="form-group">
                <label for="duration">Durée:</label>
                <input type="text" id="duration" name="duration" class="form-control" value="{{ $offer->duration }}" required>
            </div>
            <div class="form-group">
                <label for="start_date">Date de Début:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $offer->start_date }}" required>
            </div>
            <div class="form-group">
                <label for="end_date">Date de Fin:</label>
                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $offer->end_date }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer les Modifications</button>
        </form>
    </div>
@endsection
