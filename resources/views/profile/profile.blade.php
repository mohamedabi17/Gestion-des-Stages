@extends('layouts.app')
@vite(['resources/css/profile.css', 'resources/js/app.js','resources/css/layouts.css'])
@section('content')
    <div class="profile">
        <header>
            <h1 style="color: white;"> User Profile</h1>
        </header>
        <div>
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Account Type:</strong> {{ Auth::user()->usertype }}</p>
        </div>
        <button class="btn-primary">Edit Profile</button>
        <button class="btn-primary">Change Password</button>
        <button class="btn-primary">Logout</button>
    </div>
@endsection



