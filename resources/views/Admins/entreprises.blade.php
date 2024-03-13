@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All Entreprises</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entreprises as $entreprise)
                    <tr>
                        <td>{{ $entreprise->name }}</td>
                        <td>{{ $entreprise->email }}</td>
                        <td>
                            <a href="{{ route('entreprises.edit', $entreprise->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('entreprises.destroy', $entreprise->id) }}" method="POST" style="display: inline-block;">
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
@endsection
