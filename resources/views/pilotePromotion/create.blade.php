@extends('layouts.app')
@section('content')
    <div class="offers container">
        @vite(['resources/css/welcome.css', 'resources/js/app.js','resources/css/layouts.css'])
        <h1>Create Pilote</h1>
        <form action="{{ route('pilotes.create') }}" method="POST" class="create-form">
            @csrf
            <!-- Add hidden input for entreprise_id -->
            <input type="hidden" id="entreprise_id" name="entreprise_id">
            
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="name" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="type">type:</label>
                <textarea id="type" name="type" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="duree">Duration:</label>
                <input type="text" id="duree" name="duree" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-orange">Create Offer de Stage</button>
        </form>
    </div>

    <!-- JavaScript to fetch entreprise data -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchEntrepriseData();
        });

        function fetchEntrepriseData() {
            fetch('/getpromotions') // Route to fetch entreprise data
                .then(response => response.json())
                .then(data => {
                    console.log(data.entreprise_id)
                   
                    // Update the value of entreprise_id input field
                    document.getElementById('entreprise_id').value = data.entreprise_id;
                })
                .catch(error => console.error('Error fetching entreprise data:', error));
        }
    </script>
@endsection
