@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Résultats de la recherche de pilotes</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nom du pilote</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($pilotes as $pilote)
            <tr>
                <td>{{ $pilote->name }}</td>
                <!-- Add more columns and data as needed -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
