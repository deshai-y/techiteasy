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
                <button class="btn btn-default btn-xs btn-delete-category" data-toggle="modal" data-target="#questionnaireDeleteModal" title="Supprimer le questinnaire" data-id="{{ $questionnaire->id }}" data-urldelete="{!! route('admin.questionnaire.destroy', $questionnaire->id) !!}"><i class="fa fa-times"></i></button>
                <a href="{!! route('admin.questionnaire.edit', $questionnaire->id) !!}" class="btn btn-default btn-xs" title="Éditer le questionnaire"><i class="fa fa-pencil-square-o"></i></a>
            </td>
        </tr>
        @endforeach
        <?php echo $questionnaires->render(); ?>

    </tbody>
</table>
<div>
    <a href="{!! route('admin.questionnaire.create') !!}" class="btn btn-extia pull-right">Ajouter un questionnaire</a>
</div>


<div id="questionnaireDeleteModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(array('url' => URL::route('admin.questionnaire.destroy', 0), 'method' => 'DELETE', 'id' => 'category-delete-form')) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Supprimer la catégorie "<span id="category-name-delete"></span>"</h4>
            </div>
            <div class="modal-body">
                <p>Etes-vous sûre de vouloir supprimer ce questionnaire ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-extia">Supprimer</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
