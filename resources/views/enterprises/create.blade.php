<!-- resources/views/enterprises/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Enterprise</h1>
        <form action="{{ route('enterprises.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description"></textarea>
            </div>
            <!-- Add more fields as needed -->
            <button type="submit">Create Enterprise</button>
        </form>
    </div>
@endsection
