<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des offres de stage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
<body>
    <header>
        <h1>Gestion des offres de stage pour les étudiants</h1>
    </header>

    <nav>
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Offres de stage</a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Déconnexion</a></li>
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
</body>
</html>
