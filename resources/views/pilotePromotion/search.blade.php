@extends('layouts.app')

@section('content')
<div class="container">
        @vite(['resources/css/stages.css'])
    <h1>Résultats de la recherche de pilotes</h1>
    <div class="table-container">
        <table class="table">
                <thead>
                    <tr>
                        <th>Nom du pilote</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($pilotes as $pilote)
                    <tr>
                        <td>{{ $pilote->name }}</td>
                        <!-- Add more columns and data as needed -->
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
    </div>
    
     <div class="container" style="text-align: center;">
        <h2 >Créer un compte Pilote pour ajouter de nouveaux pilote</h2>
        <a class="btn-orange " href="{{ route('profile.profile') }}">Nouveau Pilote</a>
    
    </div>
</div>
@endsection
