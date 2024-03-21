@extends('layouts.app')

@section('content')
<div class="container">
    @vite(['resources/css/stages.css'])

    <h1 class="title" style="text-align:center">Offres de Stage dans la Wishlist</h1>
     <div class="table-container">
        <table class="table"  style="text-align:center" id="offers-table">
        <thead>
            <tr>
                <th>Entreprise</th>
                <th>Titre</th>
                <th>Type</th>
                <th>Durée</th>
                <th>Retirer</th>
            </tr>
        </thead>
        <tbody>
            <!-- Wishlist offers will be dynamically added here -->
        </tbody>
    </table>
     </div>
   
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/wishlistsitems')
            .then(response => response.json())
            .then(data => {
                console.log(data.offers);
   
                const offersBody = document.querySelector('#offers-table tbody');
                data.offers.forEach(offer => {
                    const row = `
                        <tr>
                            <td>${offer.entreprise.name}</td>
                            <td>${offer.name}</td>
                            <td>${offer.type}</td>
                            <td>${offer.duree}</td>
                            <td>
                                 <form action="/wishlist/remove/${offer.id}" method="POST">
                                        @csrf
                                        @method('DELETE') <!-- Add this line to set the form method to DELETE -->
                                        <input type="hidden" name="offer_id" value="${offer.id}">
                                        <button type="submit" class="btn btn-primary postuler-btn">Retirer</button>
                                    </form>
                            </td>
                        </tr>
                    `;
                    offersBody.innerHTML += row;
                });
            })
            .catch(error => console.error('Error fetching wishlist:', error));
    });
</script>
@endsection
