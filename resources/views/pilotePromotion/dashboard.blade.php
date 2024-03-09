@extends('layouts.app')
@vite(['resources/css/welcome.css', 'resources/js/app.js','resources/css/layouts.css'])
@section('content')
<header>
        <h1>Pilote de Promotion Dashboard</h1>
    </header>

        <nav>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="">les Offres de stage</a></li>
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
        <h2>Dashboard Overview</h2>
        <p>Welcome, John Doe! Here's what you can do:</p>
        <button class="btn-primary">Search for Offers</button>
        <button class="btn-primary">View Profile</button>
    </div>

@endsection
