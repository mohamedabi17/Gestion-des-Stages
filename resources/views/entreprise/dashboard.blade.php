<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>entreprise Dashboard</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    @vite(['resources/css/entreprise.css'])
    
</head>
<body>
    <header>
        <h1>Gestion des offres de stage pour les étudiants</h1>
    </header>

    <div class="container">
        <h2>entreprise Dashboard</h2>
           <!-- Operation Selection Section -->
        <button class="operation-btn" id="editBtn">Edit entreprise</button>
        <button class="operation-btn" id="statisticsBtn">View entreprise Statistics</button>
        <button class="operation-btn" id="createBtn">Create New entreprise</button>
    </div>

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
            window.location.href = "{{ route('entreprise.create') }}";
        });
    </script>
</body>
</html>
