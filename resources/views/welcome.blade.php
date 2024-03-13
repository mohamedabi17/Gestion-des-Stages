@extends('layouts.app')
@vite(['resources/css/welcome.css', 'resources/js/app.js','resources/css/layouts.css'])
@section('content')
<div class="welcome" style="background-color: black;">
    <div class="container">
     <header>
                <h1>Bienvenu dans L'Application de Gestion des offres de stage </h1>
            </header>

        <nav>
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="{{ route('profile.profile') }}">profile</a></li>
            <li><a href="/stageoffers">Offres de stage</a></li>
            <li><a href="{{ route('etudiant.etudiant') }}">Dashboard Étudiant</a></li>
            <li><a href="{{ route('entreprise.dashboard') }}">Dashboard Entreprise</a></li>
            <li><a href="{{ route('pilotePromotion.dashboard') }}">Dashboard Pilote de Promotion</a></li>
            <li><a href="{{ route('admins.index') }}">Admin</a></li>
            <li><a class=" btn-primary" href="{{ route('register') }}">Register</a></li>
            <li><a class="= btn-primary" href="{{ route('login') }}">Connexion</a></li>
            <li>
                <form action="{{ route('search.entreprise') }}" method="GET">
                    <input type="text" name="query" placeholder="Rechercher entreprise...">
                    <button type="submit" class=" btn-primary">Rechercher</button>
                </form>
            </li>
        </ul>



        </nav>

            <h2>Liste des offres de stage disponibles pour les étudiants gérées par les pôles de management :</h2>
            <table class="offers-table">
            <thead>
                <tr>
                    <th>Entreprise</th>
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

            <div class="row">
                <!-- Student Card -->
                <div class="col-md-4">
                    <div class="card" style="background-color:#ff6600;">
                        <div class="card-body">
                            <h5 class="card-title">Étudiant</h5>
                            <p class="card-text">Accédez au tableau de bord de l'étudiant.</p>
                            <a href="{{ route('etudiant.etudiant') }}" class=" btn-primary">Dashboard Étudiant</a>
                        </div>
                    </div>
                </div>

                <!-- Pilote de Promotion Card -->
                <div class="col-md-4">
                    <div class="card"  style="background-color:#ff6600;">
                        <div class="card-body">
                            <h5 class="card-title">Pilote de Promotion</h5>
                            <p class="card-text">Accédez au tableau de bord du pilote de promotion.</p>
                            <a href="{{ route('pilotePromotion.dashboard') }}" class=" btn-primary">Dashboard Pilote</a>
                        </div>
                    </div>
                </div>

                <!-- Entreprise Card -->
                <div class="col-md-4">
                    <div class="card" style="background-color:#ff6600;" >
                        <div class="card-body">
                            <h5 class="card-title">Entreprise</h5>
                            <p class="card-text">Accédez au tableau de bord de l'entreprise.</p>
                            <a href="{{ route('entreprise.dashboard') }}" class=" btn-primary">Dashboard Entreprise</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<script>

        document.addEventListener('DOMContentLoaded', function() {
            fetchOffers();
             
        });

            function fetchOffers() {
                fetch('/get-all-offers')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const offersBody = document.getElementById('offers-body');
            data.offers.forEach((offer, index) => {
                const entreprise = data.entreprises.find(ent => ent.entreprise_id === offer.entreprise_id);
                const row = `
                    <tr>
                        <td>${entreprise.name}</td>
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
//   JavaScript code to redirect
    window.onload = function() {
        // Perform the redirection based on conditions
        // Example: Redirect to the appropriate page based on user type
        let userType = '{{ Auth::user() ? Auth::user()->usertype : null }}'; // Get the user type from the authenticated user
        if (userType !== null) {
            if (userType === 'etudiant') {
                window.location.href = "{{ route('etudiant.etudiant') }}"; // Redirect to etudiant index page
            } else if (userType === 'pilotedestage') {
                window.location.href = "{{ route('pilotePromotion.dashboard') }}"; // Redirect to pilotedestage index page
            } else if (userType === 'entreprise') {
                window.location.href = "{{ route('entreprise.dashboard') }}"; // Redirect to entreprise index page
            }
            } else if (userType === 'admin') {
                window.location.href = "{{ route('admins.index') }}"; // Redirect to entreprise index page
            }
        }
</script>


@endsection
