@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="title">Les Offres de Stage de l'Entreprise</h1>
        <form action="{{ route('offers.create') }}" method="POST" class="create-form">
            @csrf
            <div class="form-group">
                <label for="title">Titre :</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="requirements">Exigences :</label>
                <textarea id="requirements" name="requirements" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="location">Lieu :</label>
                <input type="text" id="location" name="location" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="duration">Durée :</label>
                <input type="text" id="duration" name="duration" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="start_date">Date de Début :</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end_date">Date de Fin :</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Créer l'Offre de Stage</button>
        </form>
    </div>
@endsection
