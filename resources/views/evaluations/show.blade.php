@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Evaluations for {{ $entreprise->name }}</h2>

        <!-- Display each evaluation -->
        <ul>
            @foreach($evaluations as $evaluation)
                <li>{{ $evaluation->nom }} - {{ $evaluation->commentaire }}</li>
            @endforeach
        </ul>
    </div>
@endsection
