@extends('layouts.app')

@section('content')
@vite(['resources/css/register.css', ])
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg p-4">
              <div class="card-header  text-white text-center" >
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
                            <label for="user-type" class="form-label">{{ __('User Type') }}</label>
                            <select id="user-type" class="form-select @error('usertype') is-invalid @enderror" name="usertype" required>
                                <option value="etudiant">Etudiant</option>
                                <option value="entreprise">Entreprise</option>
                                <option value="pilotedestage">Pilote de Stage</option>
                                <option value="admin">Admin</option>
                            </select>
                            @error('usertype')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Additional field for Promotion -->
                        <div class="mb-3 promotion-field" style="display: none;">
                            <label for="promotion" class="form-label">{{ __('Promotion') }}</label>
                            <input id="promotion" type="text" class="form-control @error('promotion') is-invalid @enderror" name="promotion" value="{{ old('promotion') }}" autocomplete="promotion">
                            @error('promotion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Additional field for Secteur -->
                        <div class="mb-3 secteur-field" style="display: none;">
                            <label for="secteur" class="form-label">{{ __('Secteur') }}</label>
                            <input id="secteur" type="text" class="form-control @error('secteur') is-invalid @enderror" name="secteur" value="{{ old('secteur') }}" autocomplete="secteur">
                            @error('secteur')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">{{ __('Register') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('user-type').addEventListener('change', function() {
        var userType = this.value;
        var formData = new FormData();
        formData.append('userType', userType);

        fetch('/get-additional-fields/' + userType)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (data.field === 'promotion') {
                        document.querySelector('.promotion-field').style.display = 'block';
                        document.querySelector('.secteur-field').style.display = 'none';
                    } else if (data.field === 'secteur') {
                        document.querySelector('.promotion-field').style.display = 'none';
                        document.querySelector('.secteur-field').style.display = 'block';
                    }
                } else {
                    console.error('Failed to fetch additional fields:', data.message);
                }
            })
            .catch(error => console.error('Error fetching additional fields:', error));
    });
</script>

@endsection
