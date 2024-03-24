@extends('layouts.app')
@section('content')
    <div class="container" style="position: relative;">
        @vite(['resources/css/dashboardoffers.css'])
        <h1 class="title">Les Offres de Stage de l'Entreprise</h1>
        <table style="position: absolute;width:100%"class="offers-table" style="width: 100%;">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Type</th>
                    <th>Durée</th>
                    <!-- <th>Lieu</th> -->
                    <!-- <th>Durée</th>
                    <th>Date de Début</th>
                    <th>Date de Fin</th> -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="offers-body">
                <!-- Offers will be dynamically added here -->
            </tbody>
        </table>
    </div>

    <!-- JavaScript to fetch offers on page load -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchOffers();
        });

            function fetchOffers() {
                fetch('/get-offers') // Route to fetch offers
                    .then(response => response.json())
                    .then(data => {
                        console.log(data.offers);
                        const offersBody = document.getElementById('offers-body');
                        data.offers.forEach(offer => {
                            const row = `
                                <tr>
                                    <td>${offer.name}</td>
                                    <td>${offer.type}</td>
                                    <td>${offer.duree}</td>
                                    <td>
                                        <a href="/offers/${offer.id}/edit" class="btn btn-primary">Modifier</a>
                                        <a href="/offers/${offer.id}/showCandidates" class="btn btn-primary">Voir Candidats</a>
            
                                    </td>
                                </tr>
                            `;
                            offersBody.innerHTML += row;
                        });
                    })
                    .catch(error => console.error('Error fetching offers:', error));
            }

    </script>
  
@endsection
