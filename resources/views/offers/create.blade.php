@extends('layouts.app')

@section('content')
    <div class="offers container">
        @vite(['resources/css/offers.css', ])
        <h1>Create Offer de Stage</h1>
        <form action="{{ route('offers.create') }}" method="POST" class="create-form">
            @csrf
            <div class="form-group">
                <label for="name">Title:</label>
                <input type="name" id="title" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="type">type:</label>
                <textarea id="type" name="type" class="form-control" required></textarea>
            </div>
            <!-- <div class="form-group">
                <label for="requirements">Requirements:</label>
                <textarea id="requirements" name="requirements" class="form-control" required></textarea>
            </div> -->
            <!-- <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" class="form-control" required>
            </div> -->
            <div class="form-group">
                <label for="duree">Duration:</label>
                <input type="text" id="duree" name="duree" class="form-control" required>
            </div>
            <!-- <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div> -->
            <button type="submit" class="btn btn-orange">Create Offer de Stage</button>
        </form>
    </div>
@endsection
