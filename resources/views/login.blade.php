@extends('layouts.master')

@section('title', 'Administration')

@section('content')
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
                        <button type="submit" class="btn btn-lg btn-extia btn-block">Connection <i class="fa fa-rocket"></i></i></button>
                    </fieldset>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    @if (count($errors) > 0)
        $(function(){
            error_noty("{{ $errors->first()  }}");
        })
    @endif
@stop