@extends('layouts.app')

@section('content')
<div class="container">
    @vite(['resources/css/stages.css'])

    <h1 class="title">Offres de Stage</h1>
     
    <div class="table-container">
        <table class="table" id="offers-table">
            <thead>
                <tr>
                    <th>Entreprise</th>
                    <th>Titre</th>
                    <th>Type</th>
                    <th>Durée</th>
                    <th>Postuler</th>
                    <th>Evaluer Entreprise</th>
                    <th>Consulter les Evaluations</th>
                    @if(auth()->check() && auth()->user()->usertype === 'etudiant')
                        <th>Ajouter à Wishlist</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                <!-- Offers will be dynamically added here -->
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/stages')
            .then(response => response.json())
            .then(data => {
                console.log(data.offers)
                const offersBody = document.querySelector('#offers-table tbody');
                data.offers.forEach(offer => {
                    const row = `
                        <tr>
                            <td>${offer.entreprise.name}</td>
                            <td>${offer.name}</td>
                            <td>${offer.type}</td>
                            <td>${offer.duree}</td>

                            @if( auth()->check() && Auth::user()->usertype != 'pilotedestage')
                                <td>
                                    <a class="btn btn-primary postuler-btn" href="/postuler/${offer.id}/candidates" data-offer-id="${offer.id}">Postuler</a>
                                </td>
                            @endif

                            <td>
                                <a class="btn btn-primary postuler-btn" href="/evaluations/${offer.entreprise_id}/create">Evaluer Entreprise</a>
                            </td>
                            <td>
                                <a class="btn btn-primary postuler-btn" href="/evaluations/${offer.entreprise_id}">Evaluations</a>
                            </td>
                            <td>
                                @if(auth()->check() && auth()->user()->usertype === 'etudiant')
                                    <form action="/wishlist/add/${offer.id}" method="POST">
                                        @csrf
                                        <input type="hidden" name="offer_id" value="${offer.id}">
                                        <button type="submit" class="btn btn-primary postuler-btn">Ajouter à Wishlist</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    `;
                    offersBody.innerHTML += row;
                });
                // Add event listener to postuler buttons
                document.querySelectorAll('.postuler-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const offerId = this.getAttribute('data-offer-id');
                        // Perform postuler action using offerId
                        console.log('Postuler button clicked for offer id:', offerId);
                    });
                });
                
            })
            .catch(error => console.error('Error fetching stage offers:', error));
    });
</script>
@endsection
