@extends('auth.layout')
@section('content')
<div class="card">
    <div class="header">
        <p class="lead">Login to your account</p>
    </div>
    <div class="body">
        <form method="POST" action="{{ route('login') }}" class="form-auth-small" >
            @csrf
            <div class="form-group">
                <label for="signin-email" class="control-label sr-only">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

            </div>
            <div class="form-group">
                <label for="signin-password" class="control-label sr-only">Password</label>
                <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="password" required placeholder="Password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>The login credentials doesn't match</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group clearfix">
                <label class="fancy-checkbox element-left">
                    <input type="checkbox">
                    <span>Remember me</span>
                </label>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">  {{ __('Login') }}</button>
            <div class="bottom">
                <span class="helper-text m-b-10"><a href="/password/reset"><i class="fa fa-lock"></i> Forgot password?</a></span>
            </div>
            <br /><hr />
            <div class="bottom text-center">
                <span class="helper-text m-b-10"><a href="/register">Don't have an account, Sign up now</a></span>
            </div>
        </form>
    </div>
</div>
@endsection
