@extends('layouts.app')

@section('content')
    <div class="container">
        @vite(['resources/css/show-candidates.css'])
        <h1 class="title">Candidats pour l'Offre de Stage</h1>
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
                @foreach($applications as $application)
                    <tr>
                        <td>{{ $application->etudiant->name }}</td>
                        <td>{{ $application->resume }}</td>
                        <td>{{ $application->lettreofmotivation }}</td>
                        <td>{{ $application->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <a href="#" class="btn btn-primary">Accepter</a>
                            <a href="#" class="btn btn-danger">Rejeter</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
