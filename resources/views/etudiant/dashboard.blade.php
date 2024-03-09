<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiant Dashboard</title>
    @vite(['resources/css/etudiant.css','resources/css/app.css'])
</head>
<body>

<header>
    <h1>Etudiant Dashboard</h1>
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
    <button class="action-btn">Search for Offers</button>
    <button class="action-btn">View Profile</button>
</div>

<footer>
    <p>&copy; 2024 Etudiant Dashboard. All rights reserved.</p>
</footer>

</body>
</html>
