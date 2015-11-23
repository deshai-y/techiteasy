@extends('layouts.master')

@section('content')
<div class="col-md-4 col-md-offset-4">
    <div class="login-panel panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Please Sign In</h3>
        </div>
        <div class="panel-body">
            <form role="form">
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="E-mail RH" name="email" type="email" autofocus>
                    </div>
                    <br/>
                    <div class="form-group">
                        <input class="form-control" placeholder="Prénom candidat" name="firstName" type="text">
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Nom candidat" name="lastName" type="text">
                    </div>
                    <a href="index.html" class="btn btn-lg btn-extia btn-block">Choisir un QCM</a>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection
