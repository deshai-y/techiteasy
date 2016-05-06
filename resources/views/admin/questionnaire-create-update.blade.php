@extends('layouts.admin')

@section('title', $questionnaire->id ? 'Modifier' : 'Ajouter' . ' un Questionnaire')

@section('page', $page)

@section('content')
<h1 class="page-header"><i class="fa fa-bookmark"></i> Questionnaire</h1>

<ol class="breadcrumb">
	<li><a href="{!! route('admin.questionnaire.index') !!}"><i class="fa fa-arrow-circle-left"></i> Retour</a></li>
</ol>
<div class="row">
	<div class="col-md-12">
	@if($questionnaire->id)
		<h2>Modifier le questionnaire "<i>{{ $questionnaire->title}}</i>"</h2>
	@else
		<h2>Ajouter un Questionnaire</h2>
	@endif
	</div>
</div>



<div class="row">
	<div class="col-md-6">
		{!! Form::open(array('url' => $questionnaire->id ? URL::route('admin.questionnaire.update', $questionnaire->id) : URL::route('admin.questionnaire.store'), 'method' => $questionnaire->id ? 'put' : 'post')) !!}
			<div class="form-group">
				{!! Form::text('title', $questionnaire->title, array('class' => 'form-control', 'placeholder' => 'Nom', '	')) !!}
			</div>

			<table>
			@foreach($categories as $category)
			<tr>
					<td id="category-name-{{ $category->id }}">{{ $category->name }}</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>
						 <input type="checkbox" name="category_valide[]" value={{ $category->id }} @if($category->checked) checked @endif  />
					</td>
			</tr>
			@endforeach
			</table>
			<br />


			<button type="submit" class="btn btn-lg btn-extia btn-block">{!! $questionnaire->id ? 'Modifier <i class="fa fa-check"></i>' : 'Ajouter <i class="fa fa-plus"></i>' !!}</i></button>
		{!! Form::close() !!}
	</div>
</div>
@endsection