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
            <li><a href="{{ route('offers.create') }}">Créer une offre de stage</a></li>
            <li><a href="{{ route('login') }}">Connexion</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
            <li><a href="{{ route('logout') }}">Déconnexion</a></li>
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
            <h2>Opérations</h2>
            <div class="operations">
                <button id="editBtn" class="btn btn-primary" onclick="editEntreprise()">Modifier l'entreprise</button>
                <button id="statisticsBtn" class="btn btn-primary" onclick="viewStatistics()">Voir les statistiques de l'entreprise</button>
                <button id="createBtn" class="btn btn-primary" onclick="createOffre()">Créer une nouvelle offre de stage</button>
                <button id="ViewBtn" class="btn btn-primary" onclick="viewOffres()">Voir les offres</button>
                <button id="Fiche" class="btn btn-primary" onclick="viewFiche()">Fiche Entreprise</button>
            </div>
        </div>
    </main>
    <footer>
        <p>Projet de gestion des stages - Copyright © 2024</p>
    </footer>
    <script>
        function editEntreprise() {
            window.location.href = "{{ route('entreprise.edit', ['entreprise' => 1]) }}";
        }

        function viewStatistics() {
            window.location.href = "{{ route('search.entreprise') }}";
        }

        function createOffre() {
            window.location.href = "{{ route('offers.create') }}";
        }

        function viewOffres() {
            window.location.href = "{{ route('offers.index') }}";
        }

        function viewFiche() {
            var userId = '{{ Auth::user()->id }}';
            window.location.href = `/entreprises/${userId}/fiche`;
        }
    </script>
</body>



@endsection
