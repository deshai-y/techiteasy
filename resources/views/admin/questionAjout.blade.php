@extends('layouts.admin')

@section('title', 'Administration')

@section('content')
<h1 class="page-header"><i class="fa fa-question-circle"></i> Ajout d'une question</h1>
{!! Form::open(array('url' => route('admin.question.store'), 'method' => 'post')) !!}
<div class="form-group">
    <label for="category">Catégorie</label>
    {!! Form::select('categories', $categories, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="description">Description</label>
    {!! Form::text('description', old('description'), array('class' => 'form-control', 'placeholder' => 'description', 'required' => 'required')) !!}
</div>
<div class="form-group">
    <label for="question">Question</label>
    {!! Form::textArea('question', old('description'), array('class' => 'form-control', 'placeholder' => 'question', 'rows' => '3', 'required' => 'required')) !!}
</div>
<div class="form-group">
    <label for="difficulty">Difficulté</label>
    {!! Form::select('difficulties', $difficulties, null, ['class' => 'form-control']) !!}
</select>
</div>
<div class="footer pull-right">
    <a href="{!! route('admin.question.index') !!}" class="btn btn-default ">Annuler</a>
    <button type="submit" class="btn btn-extia">Sauvegarder</button>
</div>
{!! Form::close() !!}
<div>
</div>

@endsection
