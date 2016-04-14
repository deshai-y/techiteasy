@extends('layouts.master')

@section('title', 'Questionnaire Extia')

@section('content')


 {!! Form::open(array('url' => '/valider', 'method' => 'post')) !!}
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Questionnaire Extia:</h3>
            </div>
            <div class="panel-body">
            	@if (count($aQuestionnaire) == 0)
					  No records
				@else
               <table class="table table-striped">
				    <thead>
				        <tr>
				            <th>label</th>
				            <th>description</th>
				            <th>answers</th>
				        </tr>	
				    </thead>
				    <tbody>
			        @foreach($aQuestionnaire as $question)
				        <tr>
				            <td>
				            	{{ $question["label"] }}
				            	 {!! Form::hidden('questionnaire_id', $question["questionnaire_id"]) !!}
				            </td>
				            <td>
				            	{{ $question["description"] }}
				            </td>
				            <td>
				            	  <table class="table table-striped">
								    @foreach($question["answers"] as $reponses)
								    <tr>
								    	<td>{{ $reponses["label"] }}</td>
				            			<td>OUI {!! Form::radio($reponses["id"], '1' , ['class' => 'form-control']) !!}</td>
				            			<td>NON {!! Form::radio($reponses["id"], '0' , ['class' => 'form-control']) !!}</td>
								    </tr>
								    @endforeach
				            	  </table>
				            </td>
				        </tr>
			        @endforeach
	    			</tbody>
    			</table>
    			<div class="footer pull-right">
    				<button type="submit" class="btn btn-lg btn-extia btn-block">VALIDER</button>
				</div>
				<br /><br /><br />
				@endif
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection