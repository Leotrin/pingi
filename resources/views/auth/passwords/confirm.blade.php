@extends('auth.layout')

@section('content')
<div class="card">
    <div class="header">
        <p class="lead">{{ __('Confirm Password') }}</p>
    </div>

    <div class="body">
        {{ __('Please confirm your password before continuing.') }}

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="form-group row">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                       placeholder="{{ __('Password') }}" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">  {{ __('Confirm Password') }}</button>
            @if (Route::has('password.request'))
            <div class="bottom">
                <span class="helper-text m-b-10"><a href="/password/reset"><i class="fa fa-lock"></i> Forgot password?</a></span>
            </div>
            @endif
            <br /><hr />
            <div class="bottom text-center">
                <span class="helper-text m-b-10"><a href="/login"><i class="fa fa-sign-in"></i> Already a user, Login now</a></span>
            </div>
        </form>
    </div>
</div>
@endsection
