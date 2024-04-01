@extends('layouts.app')
@vite(['resources/css/register.css',])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg p-4">
                <div class="card-header text-white text-center">
                    <h4>{{ __('Register') }}</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register.store') }}" id="registerForm">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                  <div class="mb-3">
                    <label for="usertype" class="form-label">{{ __('User Type') }}</label>
                    <select style="font-family:monospace"   id="usertype" class="form-select" name="usertype" onchange="toggleInputFields(this.value)">
                        <option value="etudiant">Etudiant</option>
                        <!-- <option value="entreprise">Entreprise</option> -->
                        <option value="pilotedestage">Pilote de Stage</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                        <div class="mb-3 promotion-field" style="display: none;">
                            <label for="promotion" class="form-label">{{ __('Promotion') }}</label>
                            <input id="promotion" type="text" class="form-control" name="promotion">
                        </div>
                        <!-- <div class="mb-3 secteur-field" style="display: none;">
                            <label for="secteur" class="form-label">{{ __('Secteur') }}</label>
                            <input id="secteur" type="text" class="form-control" name="secteur">
                        </div> -->
                        <div class="mb-3">
                            <button type="submit" class="btn btn-orange w-100">{{ __('Register') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleInputFields(userType) {
        const promotionField = document.querySelector('.promotion-field');
        const secteurField = document.querySelector('.secteur-field');

        if (userType === 'etudiant') {
            promotionField.style.display = 'block';
            secteurField.style.display = 'none';
        } 
        // else if (userType === 'entreprise') {
        //     promotionField.style.display = 'none';
        //     secteurField.style.display = 'block';
        // } 
        else {
            promotionField.style.display = 'none';
            secteurField.style.display = 'none';
        }
    }
</script>

@endsection
