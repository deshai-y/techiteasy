@extends('layouts.master')

@section('title', 'Index')

@section('content')


<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Choisissez le questionnaire:</h3>
            </div>
            <div class="panel-body">
               <table class="table table-striped">
				    <thead>
				        <tr>
				            <th>#</th>
				            <th>title</th>
				            <th>Actions</th>
				        </tr>	
				    </thead>
				    <tbody>
			        @foreach($questionnaires as $questionnaire)
				        <tr>
				            <td>{{ $questionnaire->id }}</td>
				            <td>{{ $questionnaire->title }}</td>
				            <td>
				            	  <a class="question-badge edition-badge" href="{!! route('questionnaire.launch',$questionnaire->id) !!}" value="{{ $questionnaire->id }}" >GO</a>
				            </td>
				        </tr>
			        @endforeach
	    			</tbody>
    			</table>
    			{!! str_replace('/?', '?', $questionnaires->render()) !!}
            </div>
        </div>
    </div>
</div>


@endsection