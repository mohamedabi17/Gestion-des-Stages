<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search entreprise</title>
</head>
<body>
    <h2>Search entreprise</h2>
    <form action="{{ route('search.entreprise') }}" method="GET">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
        </div>
        <!-- Add more search criteria inputs as needed -->
        <button type="submit">Search</button>
    </form>
    <!-- Display search results here -->
</body>
</html>
