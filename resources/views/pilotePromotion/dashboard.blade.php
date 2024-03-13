@extends('layouts.app')
@vite(['resources/css/welcome.css', 'resources/js/app.js','resources/css/layouts.css'])
@section('content')
<header>
        <h1>Pilote de Promotion Dashboard</h1>
    </header>

         <nav>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/stageoffers">les Offres de stage</a></li>
                <li><a href="{{ route('profile.profile') }}">profile</a></li>
                <li><a href="{{ route('login') }}">Connexion</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="{{ route('logout') }}">logout</a></li>
                <li>
                    <form action="{{ route('search.pilotes') }}" method="GET">
                        <input type="text" name="query" placeholder="Rechercher pilotes...">
                        <button type="submit">Rechercher pilotes</button>
                    </form>
                </li>
            </ul>
        </nav>

    <div class="container" style="text-align: center;">
        <h2 >Chercher Un Stage et Postuler Votre Candidature </h2>
        <p style="color: wheat;">Vous devez Choisir Un stage Selon vous compétances n'oublier pas d'evaluer les entreprise</p>
        <a class="btn-orange " href="/stageoffers"class="action-btn">Offres de stage</a>
        <a class="btn-orange " href="{{ route('profile.profile') }}">profile</a>
        <a class="btn-orange " href="{{ route('profile.profile') }}">Gestion des Pilotes</a>
        <a class="btn-orange " href="{{ route('profile.profile') }}">Nouveau Pilote</a>
        <a class="btn-orange " href="{{ route('pilotePromotion.preview') }}">editer</a>
    </div>

@endsection
