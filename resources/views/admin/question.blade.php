@extends('layouts.admin')

@section('title', 'Administration')

@section('content')
<h1 class="page-header"><i class="fa fa-question-circle"></i> Questions</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Categorie</th>
            <th>Question</th>
            <th>Description</th>
            <th>Difficulté</th>
            <th>Actions</th>
        </tr>	
    </thead>
    <tbody>

        @foreach($questions as $question)
        <tr>
            <td>{{ $question->id }}</td>
            <td>{{ $question->name }}</td>
            <td>{{ $question->label }}</td>
            <td>{{ $question->description }}</td>
            <td>{{ $question->level }}</td>
            <td>
                <a class="question-badge suppression-badge" href="#" data-url="{!! route('admin.question.destroy', $question->id) !!}" data-toggle="modal" data-target="#modalSup"><i class="fa fa-times"></i></a>
                <a class="question-badge edition-badge" href="{!! route('admin.question.edit', $question->id) !!}" value="{{ $question->id }}" ><i class="fa fa-pencil-square-o"></i></a>
            </td>
        </tr>
        @endforeach


    </tbody>
</table>
<div>
    <a href="{!! route('admin.question.create') !!}" class="btn btn-extia pull-right">Ajouter une question</a>
</div>

<!-- Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title" id="myModalLabel">
                    <i class="glyphicon glyphicon-user"></i>
                    Édition
                </h4>
            </div>
            <form id="updateCSV" action="uploadCsv.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-pencil-square-o"></i>
                        </span>
                        <input id="id" class="form-control" placeholder="Identifiant" name="Identifiant" type="text" value="" required="">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-lock">
                            </i>
                        </span>
                        <input id="mdp" class="form-control" placeholder="Mot de passe" name="Mot de passe" type="password" value="" required="">
                    </div>
                    <input id="Csv" type="file" title="Fichier à ajouter" name="Csv">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-extia">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalSup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title" id="myModalLabel">
                    <i class="fa fa-times"></i>
                    Suppression
                </h4>
            </div>
            <form id="delete-form" action="" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input id="csrf" type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <p id="delete-text"> êtes vous sure de vouloir supprimer cette question? </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default " data-dismiss="modal">Annuler</button>
                    <button id="delete-btn" type="submit" class="btn btn-extia">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
