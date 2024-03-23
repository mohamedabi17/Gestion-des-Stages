@extends('layouts.app')

@section('content')
<div class="container">
    @vite(['resources/css/stages.css'])

    <h1 class="title">Les Entreprises</h1>
     
    <div class="table-container">
        <table class="table" id="entreprises-table">
            <thead>
                <tr>
                    <th>Entreprise name</th>
                    <th>Secteur</th>
                    <th>Evaluer Entreprise</th>
                    <th>Consulter les Evaluations</th>
                    <th>View Entreprise</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('getentreprises') // Update route here
            .then(response => response.json())
            .then(data => {
                console.log(data.entreprises);
                const entreprises = document.querySelector('#entreprises-table tbody');
                data.entreprises.forEach(entreprise => { // Assuming data structure is an array of objects
                    const row = `
                        <tr>
                            <td>${entreprise.name}</td>
                            <td>${entreprise.secteur}</td>
                            <td>
                                <a class="btn btn-primary postuler-btn" href="/evaluations/${entreprise.entreprise_id}/create">Evaluer Entreprise</a>
                            </td>
                            <td>
                                <a class="btn btn-primary postuler-btn" href="/evaluations/${entreprise.entreprise_id}">Evaluations</a>
                            </td>
                            <td>
                                <a class="btn btn-primary postuler-btn" href="/entreprises/${entreprise.entreprise_id}">View Entreprise</a>
                            </td>

                     
        
                        </tr>
                    `;
                    entreprises.innerHTML += row;
                });
            })
            .catch(error => console.error('Error fetching entreprises:', error));
    });
</script>
@endsection



       <!-- // <td>
                            //     <a class="btn btn-primary postuler-btn" href="/evaluations/${entreprise.entreprise_id}">offers</a>
                            // </td>
                            // <td>
                            //     <a class="btn btn-primary postuler-btn" href="/evaluations/${entreprise.entreprise_id}">Edit Fiche</a>
                            // </td>
                            // <td>
                            //     <a class="btn btn-primary postuler-btn" href="/evaluations/${entreprise.entreprise_id}">Statistics</a>
                            // </td> -->
