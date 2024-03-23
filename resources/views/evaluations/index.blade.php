@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Evaluations</h2>

        <!-- Button to create a new evaluation -->

        <!-- Display success message if it exists -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display list of evaluations if the authenticated user's usertype is entreprise -->
        @if(auth()->user())
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Commentaire</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($evaluations as $evaluation)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $evaluation->nom }}</td>
                            <td>{{ $evaluation->commentaire }}</td>
                            <td>
                                <!-- Link to view the evaluation -->
                                <a href="{{ route('evaluations.show', $evaluation->id) }}" class="btn btn-primary">View</a>
                                <!-- Link to edit the evaluation -->
                                <a href="{{ route('evaluations.edit', $evaluation->id) }}" class="btn btn-secondary">Edit</a>
                                <!-- Form to delete the evaluation -->
                                <form action="{{ route('evaluations.destroy', $evaluation->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this evaluation?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>You do not have permission to view evaluations.</p>
        @endif
    </div>
@endsection
