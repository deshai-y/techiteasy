@extends('layouts.master')

@section('title', 'Administration')

@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger  alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    @foreach ($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
</div>
@endif
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign In</h3>
            </div>
            <div class="panel-body">
                {!! Form::open(array('url' => '/auth/login', 'method' => 'post')) !!}
                    <fieldset>
                        <div class="form-group">
                            {!! Form::text('login', old('login'), array('class' => 'form-control', 'placeholder' => 'Login', 'autofocus')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) !!}
                        </div>
                        <input type="submit" class="btn btn-lg btn-extia btn-block" value="#yolo">
                    </fieldset>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection