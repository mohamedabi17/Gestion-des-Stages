@extends('layouts.app')
@section('content')
    <div class="container">
        @vite(['resources/css/candidates.css'])
        <h1 class="title">Candidature pour l'Offre de Stage</h1>
        
        @if (isset($errorMessage) && $errorMessage)
            <div class="alert alert-danger" role="alert">
                Aucun candidat trouvé pour cette offre.
            </div>
        @else
            <div class="candidates-table-container">
                <div class="table-container">
                    <table class="candidates-table">
                        <thead>
                            <tr>
                                <th>Nom de l'Étudiant</th>
                                <th>Curriculum Vitae</th>
                                <th>Lettre de Motivation</th>
                           
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody id="candidates-table-body">

                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
<script>

    document.addEventListener('DOMContentLoaded', function () {
    const imageUrl = "${candidate.cv}";
    const imageElement = document.getElementById('candidate-image');
    imageElement.src = imageUrl;
});

    document.addEventListener('DOMContentLoaded', function () {
    const url = window.location.href;
   const offerId = url.match(/\/offers\/(\d+)\/showCandidates$/)[1];
    console.log(offerId); // Log the extracted offer ID
    const candidatesBody = document.getElementById('candidates-table-body');
    console.log(offerId)
    fetch(`/offers/${offerId}/candidates`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            data.candidates.forEach(candidate => {
                const row = `
                    <tr>
                        <td>${candidate.user_id}</td>
                        <td>
                            <a href="/download-cv/${candidate.offer_id}" target="_blank" class="btn btn-view">Voir CV</a>
                        </td>
                        <td>${candidate.lettre_de_motivation}</td>
                  
                        
                    </tr>
                `;
                candidatesBody.innerHTML += row;
            });
        })
        .catch(error => console.error('Error fetching candidates:', error));
});

</script>

@endsection
<!-- <td>
                            <a href="#" class="btn btn-accept">Accepter</a>
                            <a href="#" class="btn btn-reject">Rejeter</a>
                        </td> -->