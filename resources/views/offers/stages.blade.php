@extends('layouts.app')

@section('content')
<div class="container">
    @vite(['resources/css/stages.css'])

    <h1 class="title">Offres de Stage</h1>

    <table class="table" id="offers-table">
        <thead>
            <tr>
                <th>Entreprise</th>
                <th>Titre</th>
                <th>Type</th>
                <th>Durée</th>
                <!-- <th>Lieu</th>
                <th>Date de Début</th>
                <th>Date de Fin</th> -->
                <th>Postuler</th>
                <th>Evaluer Entreprise</th>
                <th> consulter les Evaluations</th>
                <th> Ajouter  Wishlist</th>
            </tr>
        </thead>
        <tbody>
            <!-- Offers will be dynamically added here -->
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

                            <td>
                              <a class="btn btn-primary postuler-btn" href="/postuler/${offer.id}/candidates" >Postuler</a>
                              
                            </td>
                            <td>
                        
                              <a class="btn btn-primary postuler-btn" href="/evaluations/${offer.entreprise_id}/create" >Evaluer Entreprise</a>
                            </td>
                            <td>
                        
                              <a class="btn btn-primary postuler-btn" href="/evaluations/${offer.entreprise_id}/" >Evaluations</a>
                            </td>
                            <td>
                        
                              <a class="btn btn-primary postuler-btn" href="/wishlist/add/${offer.id}/" >ajouter Wishlist</a>
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
