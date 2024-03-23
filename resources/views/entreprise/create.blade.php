@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">Create Enterprise</h2>
        <form action="{{ route('entreprise.store')}}" method="POST" style="max-width: 30rem; margin: auto;">
            @csrf
            @method('POST')
            <div style="margin-bottom: 1rem;">
                <label for="name" style="display: block; font-weight: bold;">Name:</label>
                <input type="text" id="name" name="name" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem;" required>
            </div>
            <div style="margin-bottom: 1rem;">
                <label for="secteur" style="display: block; font-weight: bold;">Sector of Activity:</label>
                <input type="text" id="secteur" name="secteur" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem;" required>
            </div>
            <!-- Include existing locations for modification -->
            <div style="margin-bottom: 1rem;">
                <label for="ville" style="display: block; font-weight: bold;">ville:</label>
                <input type="text" id="ville" name="ville" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem;" required>
                <label for="pays" style="display: block; font-weight: bold;">pays:</label>
                <input type="text" id="pays" name="pays" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem;" required>
                <label for="code_postal" style="display: block; font-weight: bold;">code-postal:</label>
                <input type="text" id="code_postal" name="code_postal" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem;" required>
                <label for="numero_de_batiment" style="display: block; font-weight: bold;">numero_de_batiment:</label>
                <input type="text" id="numero_de_batiment" name="numero_de_batiment" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem;" required>
              
            </div>
            <!-- Add JavaScript to dynamically add more location fields -->
            <button class="btn btn-orange"   type="submit" style="display: block; padding: 0.5rem 1rem;  color: #fff; border: none; border-radius: 0.25rem; cursor: pointer;">Create Enterprise</button>
        </form>
    </div>
@endsection
