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
                            </select>
                            @error('usertype')
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
@endsection
