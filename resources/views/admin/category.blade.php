@extends('layouts.admin')

@section('title', 'Gestion des catégories')

@section('page', $page)

@section('content')
<h1 class="page-header"><i class="fa fa-bookmark"></i> Catégories</h1>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nom</th>
			<th>Actions</th>
		</tr>	
	</thead>
	<tbody>
		<tr>
			<td>{{ $page }}</td>
		</tr>
	</tbody>
</table>
@endsection