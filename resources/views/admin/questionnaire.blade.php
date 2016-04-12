@extends('layouts.admin')

@section('title', 'Administration')

@section('content')

<h1 class="page-header"><i class="fa fa-question-circle"></i> Questionnaire</h1>
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
                <a class="question-badge suppression-badge" href="#" data-url="{!! route('admin.questionnaire.destroy', $questionnaire->id) !!}" data-toggle="modal" data-target="#modalSup"><i class="fa fa-times"></i></a>
                <a class="question-badge edition-badge" href="{!! route('admin.questionnaire.edit', $questionnaire->id) !!}" value="{{ $questionnaire->id }}" ><i class="fa fa-pencil-square-o"></i></a>
            </td>
        </tr>
        @endforeach
        <?php echo $questionnaires->render(); ?>

    </tbody>
</table>
<div>
    <a href="{!! route('admin.questionnaire.create') !!}" class="btn btn-extia pull-right">Ajouter une questionnaire</a>
</div>

@endsection
