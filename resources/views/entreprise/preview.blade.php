@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Edit Entreprise Information</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('entreprise.update', $entreprise->entreprise_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $entreprise->name }}" required>
            </div>
            <div class="mb-3">
                <label for="secteur" class="form-label">Secteur</label>
                <input type="text" class="form-control" id="secteur" name="secteur" value="{{ $entreprise->secteur }}" required>
            </div>
            <!-- Add other entreprise fields as needed -->

            <h2>Edit Location Information</h2>

            <div class="mb-3">
                <label for="code-postal" class="form-label">Code Postal</label>
                <input type="text" class="form-control" id="code-postal" name="code-postal" >
            </div>
            <div class="mb-3">
                <label for="numero_de_batiment" class="form-label">Numero de Batiment</label>
                <input type="text" class="form-control" id="numero_de_batiment" name="numero_de_batiment" 
             required>
            </div>
            <div class="mb-3">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville">
            </div>
            <div class="mb-3">
                <label for="pays" class="form-label">Pays</label>
                <input type="text" class="form-control" id="pays" name="pays" >
            </div>
            <!-- Add other location fields as needed -->

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
