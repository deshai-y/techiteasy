@extends('layouts.admin')

@section('title', 'Gestion des catégories')

@section('page', $page)

@section('content')
<h1 class="page-header"><i class="fa fa-bookmark"></i> Catégories</h1>
<ol class="breadcrumb">
	<li><a href="{!! URL::previous() !!}"><i class="fa fa-arrow-circle-left"></i> Retour</a></li>
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
@endsection