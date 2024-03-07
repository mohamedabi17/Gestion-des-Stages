@extends('layouts.app')

@section('content')
    <div class="profile">
        @vite(['resources/css/profile.css', 'resources/css/entreprise.css'])
        <header>
            <h1>User Profile</h1>
        </header>
        <div>
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Account Type:</strong> {{ Auth::user()->usertype }}</p>
            <!-- Add more profile information here -->
        </div>
        <button class="btn-primary">Edit Profile</button>
        <button class="btn-primary">Change Password</button>
        <button class="btn-primary">Logout</button>
    </div>
@endsection



