@extends('layouts.app')
@section('content')
    <div class="container">
        @vite(['resources/css/dashboardoffers.css'])
        <h1 class="title">Les Offres de Stage de l'Entreprise</h1>
        <table class="offers-table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Exigences</th>
                    <th>Lieu</th>
                    <th>Durée</th>
                    <th>Date de Début</th>
                    <th>Date de Fin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($offers as $offer)
                    <tr>
                        <td>{{ $offer->title }}</td>
                        <td>{{ $offer->description }}</td>
                        <td>{{ $offer->requirements }}</td>
                        <td>{{ $offer->location }}</td>
                        <td>{{ $offer->duration }}</td>
                        <td>{{ $offer->start_date }}</td>
                        <td>{{ $offer->end_date }}</td>
                        <td>
                            <a href="{{ route('offers.edit', $offer->id) }}" class="btn btn-primary">Modifier</a>
                            <a href="{{ route('offers.showCandidates', $offer->id) }}" class="btn btn-primary">Voir Candidats</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
