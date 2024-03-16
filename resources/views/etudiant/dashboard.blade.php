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
                    @auth
                        <li><a href="{{ route('profile.profile') }}">profile</a></li>
                        <li><a href="{{ route('etudiant.etudiant') }}">Dashboard Étudiant</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Connexion</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                    <li>
                        <form action="{{ route('search.offres-stage') }}" method="GET" class="search-form">
                            <div class="search-input">
                                <input type="text" name="query" placeholder="Rechercher offre de stage..." class="search-input-field">
                                <button type="submit" class="search-submit-button"><img src="{{ asset('images/search.png') }}" alt="Logo" style="width: 60%;"></button>
                            </div>
                            @auth
                                <div class="additional-fields">
                                    <input type="text" name="name" placeholder="Nom de l'entreprise..." class="additional-field">
                                    <input type="text" name="location" placeholder="Lieu..." class="additional-field">
                                    <input type="text" name="competence" placeholder="Compétences..." class="additional-field">
                                </div>
                            @endauth
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
