@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create New Evaluation</h2>

        <!-- Display success message if it exists -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form to create a new evaluation -->
        <form id="evaluationForm" action="{{ route('evaluations.store') }}" method="POST">
            @csrf
            <input type="hidden" id="entreprise_id" name="entreprise_id">
            <input type="hidden" id="etudiant_id" name="etudiant_id">

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter the name" required>
            </div>
            <div class="mb-3">
                <label for="commentaire" class="form-label">Commentaire</label>
                <textarea class="form-control" id="commentaire" name="commentaire" rows="3" placeholder="Enter the comment" required></textarea>
            </div>
            <!-- Add other input fields as needed -->

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        // Fetch evaluation details using AJAX
      document.addEventListener("DOMContentLoaded", function() {
    // Get the entreprise_id from the offer's URL
    const offerUrl = window.location.href;
    const lastSlashIndex = offerUrl.lastIndexOf('/');
    const secondLastSlashIndex = offerUrl.lastIndexOf('/', lastSlashIndex - 1);
    const entrepriseId = offerUrl.substring(secondLastSlashIndex + 1, lastSlashIndex);
    console.log(entrepriseId);
    fetch(`/get-evaluation_details/${entrepriseId}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Populate hidden fields with fetched data
            document.getElementById('entreprise_id').value = data.entreprise.entreprise_id;
            if(data.etudiant.etudiant_id){
               document.getElementById('etudiant_id').value = data.etudiant.user_id;
            }
            else if(data.etudiant.pilote_id){
                document.getElementById('etudiant_id').value = data.etudiant.pilote_id;
            }
            else{
                document.getElementById('etudiant_id').value = data.etudiant.user_id;
            }
            
        })
        .catch(error => console.error('Error fetching evaluation details:', error));
});

    </script>
@endsection
