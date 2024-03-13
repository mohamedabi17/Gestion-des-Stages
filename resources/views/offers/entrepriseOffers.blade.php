@extends('layouts.app')

@section('content')
<div class="container">
    @vite(['resources/css/stages.css','resources/css/layouts.css'])

    <h1 class="title">Offres de Stage proposé par {{ $entreprise->name }}</h1>

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
            <tr>
                <td>{{ $entreprise->name }}</td>
                <td>{{ $offer->name }}</td>
                <td>{{ $offer->type }}</td>
                <td>{{ $offer->duree }}</td>
                <td>
                    <a class="btn btn-primary postuler-btn" href="/evaluations/{{ $offer->entreprise_id }}/create">Evaluer Entreprise</a>
                </td>
                <td>
                    <a class="btn btn-primary postuler-btn" href="/evaluations/{{ $offer->entreprise_id }}">Evaluations</a>
                </td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/stages')
            .then(response => response.json())
            .then(data => {
                const offersBody = document.querySelector('#offers-table tbody');
                data.offers.forEach(offer => {
                    const row = `
                        <tr>
                            <td>${offer.entreprise.name}</td>
                            <td>${offer.name}</td>
                            <td>${offer.type}</td>
                            <td>${offer.duree}</td>
                            <td>${offer.lieu}</td>
                            <td>
                                <a class="btn btn-primary postuler-btn" href="/evaluations/${offer.entreprise_id}">Consulter les Evaluations </a>
                            </td>
                            <td>
                                <form action="/wishlist/add/${offer.id}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary postuler-btn">Ajouter a Wishlist</button>
                                </form>
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
