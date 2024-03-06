<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiant Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
            background-color: #444;
            margin: 0;
        }
        nav ul li {
            display: inline;
            margin: 0 10px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .action-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .action-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Etudiant Dashboard</h1>
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
