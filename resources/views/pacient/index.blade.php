@extends('layouts.layout')

@section('title')
	 Pacientes da ADFP <small> / Pacientes / Buscar - Listar </small>
@stop


@section('content')

<div class="row">
	<div clas="col-lg-12">
	<p></p>
	<a class="btn btn-primary" href="/pacient/create">Tornar paciente</a>		
	<p></p>
	</div>
	</div>

	<!-- TABELA -->
<div class="row">
	<div clas="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Listagem de usuários</div>
			<div class="panel-body">

				<div style="overflow-x:auto;">
	@if($pacients->count() > 0)
		<table class="table table-hover table-bordered">
			<thead>
			    <th width="8%">ID</th>
				<th>Paciente</th>
				<th width="15%">Status</th>
				<th width="15%">Ações</th>
			</thead>
			<tbody>
				@foreach($pacients as $pacient)
					<tr>
					    <td>{{ $pacient->user->id }}</td>
						<td>{{ $pacient->user->name }}</td>
						<td>{{ $pacient->status->name }}</td>
						<td>
							<a class="modal-ajax-link" data-mfp-src="/pacient/edit/{{ $pacient->id }}"><i class="fa fa-pencil"></i></a>
							<a class="modal-ajax-link" data-mfp-src="/pacient/delete/{{ $pacient->id }}"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
			<tfoot>
				<th>Paciente</th>
				<th>Status</th>
				<th>Ações</th>
			</tfoot>
		</table>
	@else
		<div class="alert alert-warning">
			Nenhum paciente cadastrado.
		</div>
	@endif
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>

@endsection