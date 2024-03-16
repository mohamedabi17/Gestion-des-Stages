@extends('layouts.app')

@section('content')
    <div class="container">
        @vite(['resources/css/postule.css'])

        <h1 class="title">Postuler pour un Stage</h1>

       <form action="{{ route('postuler.storepostuler', ['id' => $offerId]) }}" method="POST" class="postule-form" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="cv">CV:</label>
                <input type="file" id="cv" name="cv" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lettre_de_motivation">Lettre de Motivation:</label>
                <textarea id="lettre_de_motivation" name="lettre_de_motivation" class="form-control" required></textarea>
            </div>
           
            <input type="hidden" id="offer_id" name="offer_id" value="{{ $offerId }}">

            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
@endsection
