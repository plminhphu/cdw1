@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-6 col-md-push-3">
        <h2>Hello <?php echo @$user->name; ?></h2>
        <div class="panel panel-default">
            <div class="panel-body">
                <form role="form" method="post" action="{{ route('postProfile') }}">
                    @csrf
                    <div class="form-group">
                        <label class="control-label">Email Address:</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="<?php echo @$user->email; ?>" required autofocus>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Name:</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="<?php echo @$user->name; ?>" required>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Phone:</label>
                        <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="<?php echo @$user->phone; ?>" required>
                        @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password:</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Confirmation Password:</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Save All</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection