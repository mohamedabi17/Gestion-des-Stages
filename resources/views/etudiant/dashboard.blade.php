@extends('layouts.app')
@vite(['resources/css/etudiant.css', 'resources/js/app.js','resources/css/layouts.css'])
@section('content')
<body style="background-color: black;"id="etudiant">

<div class="welcome" style="background-color: black;">

    <header>
        <h1>Etudiant Dashboard</h1>
    </header>

        <nav>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/stageoffers">les Offres de stage</a></li>
                <li><a href="/profil">Profil</a></li>
                <li><a href="{{ route('etudiant.etudiant') }}">Dashboard Étudiant</a></li>
                <li><a href="{{ route('login') }}">Connexion</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="{{ route('logout') }}">logout</a></li>
                <li>
                    <form action="{{ route('search.entreprise') }}" method="GET">
                        <input type="text" name="query" placeholder="Rechercher entreprise...">
                        <button type="submit">Rechercher</button>
                    </form>
                </li>
            </ul>
        </nav>

    <div class="container">
        <h2 >Chercher Un Stage et Postuler Votre Candidature </h2>
        <p style="color: wheat;">Vous devez Choisir Un stage Selon vous compétances n'oublier pas d'evaluer les entreprise</p>
        <a class="btn-orange " href="/stageoffers"class="action-btn">Offres de stage</a>
        <a class="btn-orange " href="{{ route('profile.profile') }}">profile</a>
        <!-- <button  href="/stageoffers" class="action-btn">Search for Offers</button> -->
        <!-- <button class="action-btn">View Profile</button> -->
    </div>

</div>

</body>

@endsection
