@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 style="color: #ff6600; font-size: 24px; margin-bottom: 20px;">Evaluations for {{ $entreprise->name }}</h2>

        <!-- Display each evaluation -->
        <ul style="list-style-type: none; padding: 0;">
            @foreach($evaluations as $evaluation)
                <li style="margin-bottom: 10px; padding: 10px; background-color: #f9f9f9; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <strong style="color: #333;">{{ $evaluation->nom }}</strong> - {{ $evaluation->commentaire }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
