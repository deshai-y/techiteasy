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
	<div>
		{!! Form::open(array('url' => $questionnaire->id ? URL::route('admin.questionnaire.update', $questionnaire->id) : URL::route('admin.questionnaire.store'),
			'method' => $questionnaire->id ? 'put' : 'post',
			'id' => 'formquestionnaire')) !!}
			<div class="form-group">
				{!! Form::text('title', $questionnaire->title, array('class' => 'form-control', 'placeholder' => 'Nom', '	')) !!}
			</div>
			<div>
				{!! Form::select('categories', ['' => ''] + $categories, '', array('class' => 'form-control', 'id' => 'categories')) !!}
			</div>

			<input type="hidden" value="" name="listcheck" id="listcheck">
			<div id="renderlist">

			</div>


			<button type="button" id="validate" class="btn btn-lg btn-extia btn-block">{!! $questionnaire->id ? 'Modifier <i class="fa fa-check"></i>' : 'Ajouter <i class="fa fa-plus"></i>' !!}</i></button>
		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('script')
	<script type="text/javascript">
		$(function() {
			tabCheck = new Object();

			<?php if (isset($questions)) { ?>
				tabBisCheck = "{{ $questions }}";
				$.each(tabBisCheck.split(','), function (a,b) {
					tabCheck[b] = b;
				});
			<?php } ?>

			$('#categories').change(function() {
				if($(this).val() != '') {
					$.ajax({
						url : '/admin/questionnaire/listquestion/'+$(this).val(),
						type : 'GET',
						success : function(data){ // code_html contient le HTML renvoyé
							string = "";
							string += "<div style='width:5%'><strong>&nbsp;</strong></div>";
							string += "<div style='width:5%'><strong>N°</strong></div>";
							string += "<div style='width:40%'><strong>Question</strong></div>";
							string += "<div style='width:40%'><strong>Description</strong></div>";
							string += "<div style='width:5%'><strong>Difficulté</strong></div>";
							string += "<div class='clear'></div>";

							$.each(data.response, function(i, item) {
								if(i%2 == 0)
									classodd='odd';
								else
									classodd='';

								if(tabCheck.hasOwnProperty(item.id))
									check = "checked='checked'";
								else
									check = '';

								string += "<div class='"+classodd+"' style='width:5%'><input class='checkbox' "+check+" type='checkbox' value='"+item.id+"'></div>";
								string += "<div class='"+classodd+"' style='width:5%'>"+item.id+"</div>";
								string += "<div class='"+classodd+"' style='width:40%'>"+item.label+"</div>";
								string += "<div class='"+classodd+"' style='width:40%'>"+item.description+"</div>";
								string += "<div class='"+classodd+"' style='width:5%'>"+item.level+"</div>";
								string += "<div class='clear'></div>";
							});

							$('#renderlist').html(string);

							bind();
						}

					});
				}
			})

			$('#validate').click(function() {
				$('#listcheck').val(JSON.stringify(tabCheck));

				$('#formquestionnaire').submit();
			});
		})

		function bind() {
			$(".checkbox").unbind('click');
			$(".checkbox").click(function() {
				if($(this).is(':checked'))
					tabCheck[$(this).val()] = $(this).val();
				else
					delete tabCheck[$(this).val()];
			})
		}
	</script>
@stop