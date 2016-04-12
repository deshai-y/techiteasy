@extends('layouts.master')

@section('title', 'Accueil')

@section('content')
<div class="col-md-4 col-md-offset-4">
    <div class="login-panel panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Accedez à l'espace questionnaire</h3>
        </div>
        <div class="panel-body">
              {!! Form::open(array('url' => 'login', 'method' => 'post')) !!}
                <fieldset>
                    <div class="form-group">
                        {!! Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'email', 'required' => 'required')) !!}
                    </div>
                    <br/>
                    <div class="form-group">
                         {!! Form::text('firstName', '', array('class' => 'form-control', 'placeholder' => 'Prénom candidat', 'required' => 'required')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::text('lastName', '', array('class' => 'form-control', 'placeholder' => 'Nom candidat', 'required' => 'required')) !!}
                    </div>
                    <button type="submit" class="btn btn-lg btn-extia btn-block">Choisir un QCM <i class="fa fa-rocket"></i></i></button>
                </fieldset>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
