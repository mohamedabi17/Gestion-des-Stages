<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des offres de stage</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <header>
        <h1>Gestion des offres de stage pour les étudiants</h1>
    </header>

   <nav>
<ul>
    <li><a href="#">Accueil</a></li>
    <li><a href="#">Offres de stage</a></li>
    <li><a href="#">Profil</a></li>
    <li><a href="{{ route('login') }}">Connexion</a></li>
    <li><a href="{{ route('entreprise.create') }}">Créer une entreprise</a></li>
    <li><a href="{{ route('etudiant.etudiant') }}">Dashboard Étudiant</a></li>
    <li><a href="{{ route('entreprise.dashboard') }}">Dashboard Entreprise</a></li>
    <li><a href="{{ route('pilotePromotion.pilote') }}">Dashboard Pilote</a></li>
    <li><a href="{{ route('register') }}">Register</a></li>
    <li>
        <form action="{{ route('search.entreprise') }}" method="GET">
            <input type="text" name="query" placeholder="Rechercher entreprise...">
            <button type="submit">Rechercher</button>
        </form>
    </li>
</ul>



</nav>


    <div class="container">
        <h2>Liste des offres de stage disponibles pour les étudiants gérées par les pôles de management :</h2>
        <table>
            <thead>
                <tr>
                    <th>Entreprise</th>
                    <th>Poste</th>
                    <th>Description</th>
                    <th>Date de début</th>
                    <th>Durée</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example row, replace with dynamic data -->
                <tr>
                    <td>Entreprise A</td>
                    <td>Développeur Web</td>
                    <td>Stage pour travailler sur le développement d'une application web.</td>
                    <td>01/05/2024</td>
                    <td>3 mois</td>
                    <td>
                        <button>Détails</button>
                        <button>Postuler</button>
                    </td>
                </tr>
                <!-- More rows here -->
            </tbody>
        </table>

        <div class="row">
        <!-- Student Card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Étudiant</h5>
                    <p class="card-text">Accédez au tableau de bord de l'étudiant.</p>
                    <a href="{{ route('etudiant.etudiant') }}" class="btn btn-primary">Dashboard Étudiant</a>
                </div>
            </div>
        </div>

        <!-- Pilote de Promotion Card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pilote de Promotion</h5>
                    <p class="card-text">Accédez au tableau de bord du pilote de promotion.</p>
                    <a href="{{ route('pilotePromotion.pilote') }}" class="btn btn-primary">Dashboard Pilote</a>
                </div>
            </div>
        </div>

        <!-- Entreprise Card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Entreprise</h5>
                    <p class="card-text">Accédez au tableau de bord de l'entreprise.</p>
                    <a href="{{ route('entreprise.dashboard') }}" class="btn btn-primary">Dashboard Entreprise</a>
                </div>
            </div>
        </div>
    </div>

    </div>

    <footer>
        <p>Projet de gestion des stages - Copyright © 2024</p>
    </footer>
<script>
    // JavaScript code to redirect
    window.onload = function() {
        // Perform the redirection based on conditions
        // Example: Redirect to the appropriate page based on user type
        let userType = '{{ Auth::user() ? Auth::user()->type : null }}'; // Get the user type from the authenticated user
        if (userType !== null) {
            if (userType === 'etudiant') {
                window.location.href = "{{ route('etudiant.etudiant') }}"; // Redirect to etudiant index page
            } else if (userType === 'pilotedestage') {
                window.location.href = "{{ route('pilotePromotion.pilote') }}"; // Redirect to pilotedestage index page
            } else if (userType === 'entreprise') {
                window.location.href = "{{ route('entreprise.dashboard') }}"; // Redirect to entreprise index page
            }
        }
    };
</script>



</body>
</html>
