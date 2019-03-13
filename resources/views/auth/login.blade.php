@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-6 col-md-push-3">
        <h2>Log in to your account</h2>
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label class="control-label">Email Address:</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password:</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" checked="true" {{ old('remember') ? 'checked' : '' }}>
                           <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Log In</button>
<!--                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
