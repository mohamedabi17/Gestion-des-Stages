@extends('layouts.app')

@section('content')
<div class="container">
    @vite(['resources/css/stages.css'])

    <h1 class="title">Offres de Stage dans la Wishlist</h1>

    <table class="table" id="offers-table">
        <thead>
            <tr>
                <th>Entreprise</th>
                <th>Titre</th>
                <th>Type</th>
                <th>Durée</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Wishlist offers will be dynamically added here -->
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/wishlist')
            .then(response => response.json())
            .then(data => {
                console.log(data);
                const offersBody = document.querySelector('#offers-table tbody');
                data.wishlist.forEach(offer => {
                    const row = `
                        <tr>
                            <td>${offer.entreprise.name}</td>
                            <td>${offer.name}</td>
                            <td>${offer.type}</td>
                            <td>${offer.duree}</td>
                            <td>
                                <form action="/wishlist/remove/${offer.id}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Remove from Wishlist</button>
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
