<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluate entreprise</title>
</head>
<body>
    <h2>Evaluate entreprise</h2>
    <form action="{{ route('evaluate.entreprise') }}" method="POST">
        @csrf

        <input type="hidden" name="entreprise_id" value="{{ $entreprise->id }}">
        <!-- Hidden field to store the entreprise ID -->

        <div>
            <label for="rating">Rating (1-5):</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required>
            <!-- Input field for rating the entreprise (1-5) -->
        </div>

        <div>
            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feedback" required></textarea>
            <!-- Textarea for providing feedback -->
        </div>

        <button type="submit">Submit Evaluation</button>
    </form>
</body>
</html>
