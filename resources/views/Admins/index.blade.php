@extends('layouts.app')
@vite(['resources/css/welcome.css', 'resources/js/app.js','resources/css/layouts.css'])
@section('content')
<div class="welcome" style="background-color: black;">
     <header>
        <h1 style="color: black;">Gestion des offres de stage pour les étudiants</h1>
    </header>

   <nav>
<ul>
    <li><a style="color: black;" class="bebas-neue-regular" href="/">Accueil</a></li>
    <li><a style="color: black;" class="bebas-neue-regular" href="#">Offres de stage</a></li>
    <li><a style="color: black;" class="bebas-neue-regular" href="{{ route('profile.profile') }}">Profil</a></li>
    <li><a style="color: black;" class="bebas-neue-regular" href="{{ route('login') }}">Connexion</a></li>
    <li><a style="color: black;" class="bebas-neue-regular" href="{{ route('entreprise.create') }}">Créer une entreprise</a></li>
    <li><a style="color: black;" class="bebas-neue-regular" href="{{ route('etudiant.etudiant') }}">Dashboard Étudiant</a></li>
    <li><a style="color: black;" class="bebas-neue-regular" href="{{ route('pilotePromotion.dashboard') }}">Dashboard Pilote</a></li>
    <li><a style="color: black;" class="bebas-neue-regular" href="{{ route('register') }}">Register</a></li>
    <li>
       <form action="{{ route('search.offres-stage') }}" method="GET" class="search-form">
                        <div class="search-input">
                            <input type="text"style="color: #ff6600;" name="query" placeholder="Rechercher offre de stage..." class="search-input-field">
                            <button type="submit"style="color: #ff6600;" class="search-submit-button"><img src="{{ asset('images/search.png') }}" alt="Logo" style="width: 60%;"></button>
                        </div>
                        <div class="additional-fields">
                            <input type="text"style="color: #ff6600;" name="entreprise_name" placeholder="Nom de l'entreprise..." class="additional-field">
                            <input type="text" style="color: #ff6600;"name="location" placeholder="Lieu..." class="additional-field">
                            <input type="text" style="color: #ff6600;"name="competence" placeholder="Compétences..." class="additional-field">
                        </div>
        </form>
    </li>
</ul>



</nav>
     <h1 class="bebas-neue-regular"    style="color: black;">Gestion des Comptes</h1>
      <div class="row">
            <!-- Etudiants Card -->
            <div class="col-md-4">
                <div style="color: #ff6600;;background-color:black"class="newcard">
                    <div class="newcard-body">
                        <h5 style="color: #ff6600;;" class="newcard-title">Etudiants</h5>
                        <p class="newcard-text">View, update, and delete etudiants records.</p>
                        <a href="{{ route('admins.etudiants') }}" class="btn-primary">Go to Etudiants</a>
                    </div>
                </div>
            </div>

            <!-- Pilotes Card -->
            <div class="col-md-4">
                 <div style="color: #ff6600;;background-color:black"class="newcard">
                    <div class="newcard-body">
                        <h5 style="color: #ff6600;;" class="newcard-title"class="newcard-title">Pilotes</h5>
                        <p class="newcard-text">View, update, and delete pilotes records.</p>
                        <a href="{{ route('admins.pilotes') }}" class=" btn-primary">Go to Pilotes</a>
                    </div>
                </div>
            </div>

      

            <!-- Admins Card -->
            <div class="col-md-4">
                <div class="newcard">
                    <div  style="color: #ff6600;;background-color:black"class="newcard">
                        <h5 style="color: #ff6600;;" class="newcard-title">Admins</h5>
                        <p class="newcard-text">View, update, and delete admins records.</p>
                        <a href="{{ route('admins.admins') }}" class="btn-primary">Go to Admins</a>
                    </div>
                </div>
            </div>

            <!-- Users Card -->
            <div class="col-md-4">
                <div class="newcard">
                    <div  style="color: #ff6600;;background-color:black"class="newcard">
                        <h5 style="color: #ff6600;;" class="newcard-title">Users</h5>
                        <p class="newcard-text">View, update, and delete users records.</p>
                        <a href="{{ route('admins.users') }}" class=" btn-primary">Go to Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="newcard">
                    <div  style="color: #ff6600;;background-color:black"class="newcard">
                        <h5 style="color: #ff6600;;" class="newcard-title">offers</h5>
                        <p class="newcard-text">View, update, and delete users records.</p>
                        <a href="{{ route('offers.stages') }}" class=" btn-primary">offers</a>
                    </div>
                </div>
            </div>
        </div>


        <h2 class="bebas-neue-regular " style="color: black;;"> Admin Dashboard</h2>


    <div class="container">
        <h2 class="bebas-neue-regular " style="color: black;;">Liste des offres de stage disponibles pour les étudiants gérées par les pôles de management :</h2>
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
        <h2 style="color: black;;" class="newcard-title">Admin Dashboard</h2>
        <div class="row">
               
        <!-- Student Card -->
        <div class="col-md-4">
            <div class="newcard">
                <div  style="color: #ff6600;;background-color:black"class="newcard">
                    <h5 style="color: #ff6600;;" class="newcard-title">Étudiant</h5>
                    <p class="newcard-text">Accédez au tableau de bord de l'étudiant.</p>
                    <a href="{{ route('etudiant.etudiant') }}" class=" btn-primary">Dashboard Étudiant</a>
                </div>
            </div>
        </div>

        <!-- Pilote de Promotion Card -->
        <div class="col-md-4">
            <div class="newcard">
                <div  style="color: #ff6600;;background-color:black"class="newcard">
                    <h5 style="color: #ff6600;;" class="newcard-title">Pilote de Promotion</h5>
                    <p class="newcard-text">Accédez au tableau de bord du pilote de promotion.</p>
                    <a href="{{ route('pilotePromotion.dashboard') }}" class=" btn-primary">Dashboard Pilote</a>
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
                fetch('/get-all-offers').then(response => response.json()).then(data => {
            console.log();
            const offersBody = document.getElementById('offers-body');
            data.offers.forEach((offer, index) => {
                const row = `
                    <tr>
                        <td class="bebas-neue-regular " style="color: black;;">${offer.name}</td>
                        <td class="bebas-neue-regular " style="color: black;;">${offer.name}</td>
                        <td class="bebas-neue-regular " style="color: black;;">${offer.type}</td>
                        <td class="bebas-neue-regular " style="color: black;;">${offer.duree}</td>
                        <td class="bebas-neue-regular " style="color: black;;">
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
  // JavaScript code to redirect
    window.onload = function() {
        // Perform the redirection based on conditions
        // Example: Redirect to the appropriate page based on user type
        let userType = '{{ Auth::user() ? Auth::user()->usertype : null }}'; // Get the user type from the authenticated user
        if (userType !== null) {
            if (userType === 'etudiant') {
                window.location.href = "{{ route('etudiant.etudiant') }}"; // Redirect to etudiant index page
            } else if (userType === 'pilotedestage') {
                window.location.href = "{{ route('pilotePromotion.dashboard') }}"; // Redirect to pilotedestage index page
            } 
        }}
</script>


@endsection
