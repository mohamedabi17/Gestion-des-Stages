@extends('layouts.app')
@vite(['resources/css/entreprise.css','resources/css/app.css', 'resources/js/app.js','resources/css/layouts.css'])
  @vite(['resources/css/welcome.css'])
@section('content')
<body>
    <header>
        <h1>Entreprise Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="{{ route('offers.dashboard') }}">Les Offres de stage</a></li>
            <li><a href="{{ route('offers.create') }}">Creé un offre de Stage</a></li>
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
    <main>
        <div class="container">
            <h2>Operations</h2>
            <div class="operations">
                <button id="editBtn">Edit entreprise</button>
                <button id="statisticsBtn">View entreprise Statistics</button>
                <button id="createBtn">Create New Offre De Stage</button>
                <button id="ViewBtn">View Offers</button>
                <button id="Fiche">Fiche Entreprise</button>
            </div>
        </div>
    </main>
    <footer>
        <p>Projet de gestion des stages - Copyright © 2024</p>
    </footer>
    <script>
        document.getElementById("editBtn").addEventListener("click", function() {
            window.location.href = "{{ route('entreprise.edit', ['entreprise' => 1]) }}";
        });

        document.getElementById("statisticsBtn").addEventListener("click", function() {
            window.location.href = "{{ route('search.entreprise') }}";
        });

        document.getElementById("createBtn").addEventListener("click", function() {
            window.location.href = "{{ route('offers.create') }}";
        });
        document.getElementById("ViewBtn").addEventListener("click", function() {
            window.location.href = "{{ route('offers.index') }}";
        });
       document.getElementById("Fiche").addEventListener("click", function() {
            // Fetch the user_id of the authenticated user
            var userId = '{{ Auth::user()->id }}';

            // Redirect to the fiche route with the user_id
            window.location.href = `/entreprises/${userId}/fiche`;
        });

    </script>
</body>

@endsection
