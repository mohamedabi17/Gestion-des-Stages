@extends('layouts.app')
@vite(['resources/css/offers.css','resources/css/stages.css'])
@section('content')
    <div class="container">
        <h2>All Pilotes</h2>

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
                @foreach ($pilotes as $pilote)
                    <tr>
                        <td>{{ $pilote->name }}</td>
                        <td>{{ $pilote->user->email }}</td>
                        <td>
                            <a href="{{ route('pilotePromotion.preview') }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('pilotes.destroy', $pilote->pilote_id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary" >Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        
    </div>
@endsection
