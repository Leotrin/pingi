@extends('auth.layout')

@section('content')
<div class="card">
    <div class="header">
        <p class="lead">{{ __('Reset Password') }}</p>
    </div>

    <div class="body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group row">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       placeholder="{{ __('E-Mail Address') }}"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary btn-lg btn-block">
                {{ __('Send Password Reset Link') }}
            </button>
            <br /><hr />
            <div class="bottom text-center">
                <span class="helper-text m-b-10"><a href="/login"><i class="fa fa-sign-in"></i> Already a user, Login now</a></span>
            </div>
        </form>
    </div>
</div>
@endsection
