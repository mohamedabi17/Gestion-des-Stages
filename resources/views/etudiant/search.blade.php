@extends('layouts.app')
@vite(['resources/css/etudiant.css', 'resources/js/app.js','resources/css/layouts.css'])
@section('content')
<body style="background-color: black;" id="etudiant">

    <div class="welcome" style="background-color: black;text-align:center;">

        <h2 style="background-color: #ffffAF;text-align:center;">Résultats de la recherche</h2>

        <table class="offers-table">
            <thead>
                <tr>
                    <th>Nom de l'offre</th>
                    <th>Compétences requises</th>
                    <th>Localité</th>
                    <th>Entreprise</th>
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($offers as $offer)
                <tr>
                    <td>{{ $offer->name }}</td>
                    <td>{{ $offer->type }}</td>
                    <td>{{ $offer->duree }}</td>
                    <td>{{ $offer->entreprise->name }}</td>
                    <!-- Add more table cells for additional offer details -->
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>

@endsection
