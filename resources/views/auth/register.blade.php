@extends('auth.layout')

@section('content')
<div class="card">
    <div class="header">
        <p class="lead">Create an account/p>
    </div>
    <div class="body">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                       placeholder="{{ __('Name') }}"
                       required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group row">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                       placeholder="{{ __('E-Mail Address') }}"
                       required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group row">
                <label for="password" class="control-label sr-only">{{ __('Password') }}</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                       placeholder="{{ __('Password') }}"
                       required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group row">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                       placeholder="{{ __('Confirm Password') }}"
                       required autocomplete="new-password">
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">
                {{ __('Register') }}
            </button>
            <br /><hr />
            <div class="bottom text-center">
                <span class="helper-text m-b-10"><a href="/login"><i class="fa fa-sign-in"></i> Already a user, Login now</a></span>
            </div>
        </form>
    </div>
</div>
@endsection
