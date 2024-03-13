@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Etudiants List</h2>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Competences</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($etudiants as $etudiant)
            <tr>
                <td>{{ $etudiant->id }}</td>
                <td>{{ $etudiant->name }}</td>
                <td>{{ $etudiant->competences }}</td>
                <td>
                    <a href="{{ route('etudiants.show', $etudiant) }}" class="btn btn-info">View</a>
                    <a href="{{ route('etudiants.edit', $etudiant) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('etudiants.destroy', $etudiant) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this etudiant?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
