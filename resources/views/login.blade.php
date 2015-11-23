@extends('layouts.master')

@section('title', 'Administration')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign In</h3>
            </div>
            <div class="panel-body">
                {!! Form::open(array('url' => '/auth/login', 'method' => 'post')) !!}
                    <fieldset>
                        <div class="form-group">
                            {!! Form::text('login', Input::old('login'), array('class' => 'form-control', 'placeholder' => 'Login', 'autofocus')) !!}
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