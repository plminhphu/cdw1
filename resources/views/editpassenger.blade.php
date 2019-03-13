@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-6 col-md-push-3">
        <h2>Join as a Wordskills Travel Member</h2>
        <div class="panel panel-default">
            <div class="panel-body">
                <form role="form" method="post" action="{{ route('postEditPassenger') }}">
                    @csrf
                    <input name="id_passenger" type="hidden" value="<?php echo $passenger->id_passenger; ?>">
                    <div class="form-group">
                        <label class="control-label">Gender:</label>
                        <select name="gender_passenger" class="form-control" required="true">
                            @if($passenger->gender_passenger=='mr')
                            <option value="mr" selected="true">Mr.</option>
                            <option value="mrs">Mrs.</option>
                            @else
                            <option value="mr">Mr.</option>
                            <option value="mrs" selected="true">Mrs.</option>
                            @endif
                        </select>
                        @if ($errors->has('gender_passenger'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('gender_passenger') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">First Name:</label>
                        <input id="fname_passenger" type="text" class="form-control{{ $errors->has('fname_passenger') ? ' is-invalid' : '' }}" name="fname_passenger" value="<?php echo $passenger->fname_passenger; ?>"  autofocus>
                        @if ($errors->has('fname_passenger'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('fname_passenger') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Last Name:</label>
                        <input id="lname_passenger" type="text" class="form-control{{ $errors->has('lname_passenger') ? ' is-invalid' : '' }}" name="lname_passenger" value="<?php echo $passenger->lname_passenger; ?>" >
                        @if ($errors->has('lname_passenger'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lname_passenger') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Save Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
