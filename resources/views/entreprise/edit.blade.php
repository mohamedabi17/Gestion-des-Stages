<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify entreprise</title>
</head>
<body>
    <h2>Modify entreprise</h2>
    <form action="{{ route('entreprise.update', $entreprise->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $entreprise->name }}" required>
        </div>
        <div>
            <label for="sector">Sector of Activity:</label>
            <input type="text" id="sector" name="sector" value="{{ $entreprise->sector }}" required>
        </div>
        <!-- Include existing locations for modification -->
        <div>
            <label for="locations">Locations:</label>
            @foreach($entreprise->locations as $location)
                <input type="text" id="locations" name="locations[]" value="{{ $location->name }}" required>
            @endforeach
            <button type="button" id="add-location">Add Location</button>
        </div>
        <!-- Add JavaScript to dynamically add more location fields -->
        <button type="submit">Modify Entreprise</button>
    </form>
</body>
</html>
