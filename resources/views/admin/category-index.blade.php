@extends('layouts.admin')

@section('title', 'Gestion des catégories')

@section('page', $page)

@section('content')
<h1 class="page-header"><i class="fa fa-bookmark"></i> Catégories</h1>
<ol class="breadcrumb">
	<li><a href="{!! route('dashboard') !!}"><i class="fa fa-tachometer"></i> Dashboard</a></li>
	<li><a href="{!! route('admin.category.create') !!}"><i class="fa fa-plus-square"></i> Ajouter une catégorie</a></li>
</ol>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nom</th>
			<th>Actions</th>
		</tr>	
	</thead>
	<tbody>
@foreach($categories as $category)
		<tr>
			<td>{{ $category->id }}</td>
			<td>{{ $category->name }}</td>
			<td>
				<a href="{!! route('admin.category.edit', $category->id) !!}" class="btn btn-default btn-xs" title="Éditer la catégorie"><i class="fa fa-pencil-square-o"></i></a>
				<a href="" class="btn btn-default btn-xs" title="Supprimer la catégorie"><i class="fa fa-times"></i></a>
			</td>
		</tr>
@endforeach
	</tbody>
</table>
{!! $categories->render() !!}
<div class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog">
    	<div class="modal-content">
    		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title">Supprimer <span></span></h4>
      		</div>
      		<div class="modal-body">
        		<p>One fine body&hellip;</p>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary">Save changes</button>
      		</div>
    	</div>
  	</div>
</div>
@endsection