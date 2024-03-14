@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Résultats de la recherche d'entreprises</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nom de l'entreprise</th>
                <th>Secteur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entreprises as $entreprise)
            <tr>
                <td>{{ $entreprise->name }}</td>
                <td>{{ $entreprise->secteur }}</td>
                <td>
                    <!-- Add actions such as viewing details or applying -->
                    <a href="{{ route('entreprise.fiche', $entreprise->entreprise_id) }}" class="btn btn-primary">Voir détails</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
