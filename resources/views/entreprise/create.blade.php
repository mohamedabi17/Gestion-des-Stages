<!-- resources/views/entreprises/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create entreprise</h1>
        <form action="{{ route('entreprise.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
             <div>
            <label for="sector">Sector of Activity:</label>
            <input type="text" id="sector" name="sector" required>
        </div>
        <div>
            <label for="locations">Locations:</label>
            <input type="text" id="locations" name="locations[]" required>
            <button type="button" id="add-location">Add Location</button>
        </div>
            <!-- Add more fields as needed -->
            <button type="submit">Create entreprise</button>
        </form>
    </div>
@endsection
