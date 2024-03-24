@extends('layouts.app')
@section('content')
    <div class="container" style="display:flex;justify-content:center;width:70%">
        <div class="candidate-cv-container" style="display:flex;justify-content:center;width:100%">
            <img src="{{ asset($candidate->cv) }}" alt="Candidate CV" style="display:flex;justify-content:center;width:100%" class="candidate-cv">
        </div>
    </div>

    
@endsection
