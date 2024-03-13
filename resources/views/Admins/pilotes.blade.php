@extends('layouts.app')
    @vite(['resources/css/offers.css'])
@section('content')
    <div class="container">
        <h2>All Pilotes</h2>

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
                @foreach ($pilotes as $pilote)
                    <tr>
                        <td>{{ $pilote->name }}</td>
                        <td>{{ $pilote->email }}</td>
                        <td>
                            <a href="{{ route('pilotes.edit', $pilote->pilote_id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('pilotes.destroy', $pilote->pilote_id) }}" method="POST" style="display: inline-block;">
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
