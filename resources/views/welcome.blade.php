<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des offres de stage</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        header, footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        nav {
            background-color: #444;
            padding: 10px 0;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }
        nav ul li {
            display: inline;
            margin: 0 10px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        footer p {
            margin: 0;
        }
    </style>
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
