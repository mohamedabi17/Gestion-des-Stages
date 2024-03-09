@extends('layouts.app')

@section('content')
    <div class="container">
        @vite(['resources/css/postule.css'])

        <h1 class="title">Postuler pour un Stage</h1>

       <form action="{{ route('postuler.storepostuler', ['id' => $offerId]) }}" method="POST" class="postule-form">

            @csrf

            <div class="form-group">
                <label for="cv">CV:</label>
                <input type="file" id="cv" name="cv" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lettre_de_motivation">Lettre de Motivation:</label>
                <textarea id="lettre_de_motivation" name="lettre_de_motivation" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="etudiant_id">Étudiant Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="offer_id">Competence:</label>
                <input type="text" id="offer_id" name="offer_id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
@endsection
