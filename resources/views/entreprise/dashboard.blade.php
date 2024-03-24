@extends('layouts.app')
@vite(['resources/css/entreprise.css','resources/css/welcome.css', 'resources/js/app.js','resources/css/layouts.css'])
  @vite(['resources/css/welcome.css'])
@section('content')
<body>
    <header>
       <h1 style="color: white;">Entreprise {{ $entreprise->name }} </h1>
    </header>
    <nav>
       <ul>
            <li><a href="/">Accueil</a></li>
            @auth
                <li><a href="{{ route('profile.profile') }}">Profile</a></li>                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Déconnexion</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">Connexion</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endauth
            <li>
                <form action="{{ route('search.entreprise') }}" method="GET" class="search-form">
                    <div class="search-input">
                        <input type="text" name="query" placeholder="Rechercher entreprise..." class="search-input-field">
                        <button style="background-color: #cc5500;" type="submit" class="search-submit-button"><img src="{{ asset('images/search.png') }}" alt="Logo" style="width: 100%;"></button>
                    </div>
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
        var entrepriseId = "{{ $entreprise->entreprise_id }}"; // Assuming 'id' is the primary key of the entreprise model
                function viewStatistics() {
            window.location.href = "/offers/statistics";
        }


        function createOffre() {
            window.location.href = `/offers/create/${entrepriseId}`;
        }

         

        function viewOffres() {
            window.location.href = `/get-offers-by-entreprise/${entrepriseId}`;
        }
         function viewFiche() {
        // Extracting entreprise_id from the URL
        var url = window.location.href;
        var entreprise_id = url.substring(url.lastIndexOf('/') + 1);
        
        // Redirecting to the fiche page with the extracted entreprise_id
        window.location.href = `/entreprises/${entreprise_id}/fiche`;
    }
    </script>
</body>



@endsection
