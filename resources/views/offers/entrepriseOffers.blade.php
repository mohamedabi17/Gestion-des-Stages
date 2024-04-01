    @extends('layouts.app')

@section('content')
<div class="container">
    @vite(['resources/css/stages.css', 'resources/css/layouts.css'])

    <h1 class="title">Offres de Stage proposé par {{ $entreprise->name }}</h1>
    <div class="table-container">
         <table class="table" id="offers-table">
        <thead>
            <tr>
                <th>Entreprise</th>
                <th>Titre</th>
                <th>Type</th>
                <th>Durée</th>
                <th>Lieu</th>
                <th>Consulter Les Candidatures</th>
                <th>Consulter les Evaluations </th>
            </tr>
        </thead>
        <tbody>
            @foreach($offers as $offer)
            <tr data-offer-id="{{ $offer->id }}">
                <td>{{ $entreprise->name }}</td>
                <td>{{ $offer->name }}</td>
                <td>{{ $offer->type }}</td>
                <td>{{ $offer->duree }}</td>
                <td>{{ $offer->lieu }}</td> Assuming lieu is the location
                <td>
                    <a href="{{ route('offers.showCandidates', ['id' => $offer->id]) }}" class="btn btn-primary postuler-btn">Consulter les candidatures</a>
                </td>
                <td>
                    <a href="/evaluations/{{ $offer->entreprise_id }}" class="btn btn-primary postuler-btn">Consulter les Evaluations</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/stages')
            .then(response => response.json())
            .then(data => {
                const offersBody = document.querySelector('#offers-table tbody');
                data.offers.forEach(offer => {
                    const row = `
                        <tr data-offer-id="${offer.id}">
                            <td>${offer.entreprise.name}</td>
                            <td>${offer.name}</td>
                            <td>${offer.type}</td>
                            <td>${offer.duree}</td>
                            <td>${offer.lieu}</td> <!-- Assuming lieu is the location -->
                            <td>
                                  <a href="/offers/${offer.id}/showCandidates"class="btn btn-primary postuler-btn">Consulter les candidatures</a>
                            </td>
                            <td>
                                <a href="/evaluations/${offer.entreprise_id}" class="btn btn-primary postuler-btn">Consulter les Evaluations</a>
                            </td>
                        </tr>
                    `;
                    offersBody.innerHTML += row;
                });
            })
            .catch(error => console.error('Error fetching stage offers:', error));
    });
</script>
@endsection
