@extends('layouts.layout')
@section('content')
	<h3>Pacientes</h3>
	<p></p>
	<a class="btn btn-primary" href="/pacient/create">Tornar paciente</a>		
	<p></p>
	@if($pacients->count() > 0)
		<table class="table table-hover table-bordered">
			<thead>
				<th>Paciente</th>
				<th>Status</th>
				<th>Ações</th>
			</thead>
			<tbody>
				@foreach($pacients as $pacient)
					<tr>
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
	@endif;

@endsection