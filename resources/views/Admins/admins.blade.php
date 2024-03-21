@extends('layouts.app')
@vite(['resources/css/welcome.css', 'resources/js/app.js','resources/css/layouts.css'])
@section('content')
    <div class="container " >
        <h2>All Admins</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-container"> 
              <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>
                            <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('profile.profile') }}" class="btn btn-info">Preview</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        
    </div>
@endsection
