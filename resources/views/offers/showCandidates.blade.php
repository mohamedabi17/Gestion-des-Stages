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
                        <!-- Table headers -->
                        <thead>
                            <tr>
                                <th>Nom de l'Étudiant</th>
                                <th>Curriculum Vitae</th>
                                <th>Lettre de Motivation</th>
                                <th>Date de Candidature</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody>
                            @foreach ($candidates as $candidate)
                            <tr>
                                <td>{{ $candidate->user->name }}</td>
                                <td>
                                    <!-- Assuming $candidate->cv contains the file path for CV -->
                                    <a href="{{ asset($candidate->cv) }}" target="_blank" class="btn btn-view">Voir CV</a>
                                </td>
                                <td>{{ $candidate->lettre_de_motivation }}</td>
                                <td>{{ $candidate->created_at->format('d/m/Y H:i:s') }}</td>
                                <td>
                                    <a href="#" class="btn btn-accept">Accepter</a>
                                    <a href="#" class="btn btn-reject">Rejeter</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
