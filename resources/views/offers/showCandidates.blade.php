@extends('layouts.app')

@section('content')
    <div class="container">
        @vite(['resources/css/candidates.css'])
        <h1 class="title">Candidature pour l'Offre de Stage</h1>
        <div class="candidates-table-container">
            <table class="candidates-table">
                <thead>
                    <tr>
                        <th>Nom de l'Étudiant</th>
                        <th>Curriculum Vitae</th>
                        <th>Lettre de Motivation</th>
                        <th>Date de Candidature</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $postule->etudiant->name }}</td>
                        <td>
                            <!-- Assuming $postule->cv contains the file path for CV -->
                            <a href="{{ asset($postule->cv) }}" target="_blank" class="btn btn-view">Voir CV</a>
                        </td>
                        <td>{{ $postule->lettre_de_motivation }}</td>
                        <td>{{ $postule->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <a href="#" class="btn btn-accept">Accepter</a>
                            <a href="#" class="btn btn-reject">Rejeter</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
