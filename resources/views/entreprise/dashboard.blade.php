@extends('layouts.app')
@vite(['resources/css/entreprise.css','resources/css/welcome.css', 'resources/js/app.js','resources/css/layouts.css'])
  @vite(['resources/css/welcome.css'])
@section('content')
<body>
    <header>
        <h1 style="color: white;">Entreprise Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="/">Accueil</a></li>
                   <li><a href="{{ route('profile.profile') }}">profile</a></li>
            <li><a href="{{ route('offers.create') }}">Créer une offre de stage</a></li>
            <li><a href="{{ route('login') }}">Connexion</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
            <li><a href="{{ route('logout') }}">Déconnexion</a></li>
            <li>
                   <form action="{{ route('search.entreprise') }}" method="GET" class="search-form">
                        <div class="search-input">
                             <input type="text" name="query" placeholder="Rechercher entreprise..." class="search-input-field">
                             <button  style="background-color: #cc5500;"  type="submit"class="search-submit-button"><img src="{{ asset('images/search.png') }}" alt="Logo" style="width: 100%;"></button>
                    </form>
               
            </li>
        </ul>
    </nav>
    <main>
        <div class="container">
            <h2>Opérations</h2>
            <div class="operations">
                <button id="statisticsBtn" class="btn-primary" onclick="viewStatistics()">statistiques</button>
                <button id="createBtn" class="btn-primary" onclick="createOffre()">nouveau offre</button>
                <button id="ViewBtn" class="btn-primary" onclick="viewOffres()">les offres</button>
                <button id="Fiche" class="btn-primary" onclick="viewFiche()">Fiche Entreprise</button>
            </div>
        </div>
    </main>
    <footer>
        <p>Projet de gestion des stages - Copyright © 2024</p>
    </footer>
    <script>

        function viewStatistics() {
            window.location.href = "{{ route('search.entreprise') }}";
        }

        function createOffre() {
            window.location.href = "{{ route('offers.create') }}";
        }

        function viewOffres() {
          window.location.href = `/get-offers-by-entreprise`;
        }
     

        function viewFiche() {
            var userId = '{{ Auth::id() }}';
            window.location.href = `/entreprises/${userId}/fiche`;
        }
    </script>
</body>



@endsection
