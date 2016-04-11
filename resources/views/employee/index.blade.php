@extends('layouts.layout')
@section('content')
	<h2>Funcionários</h2>
	<div class="clearfix"></div>
	@if($employees)
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Departamento</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($employees as $employee)
					<tr>
						<td>{{ $employee->user->name  }}</td>
						<td>{{ $employee->departament->name }}</td>
						<td>
							<a class="modal-ajax-link" data-mfp-src="/employee/edit/{{ $employee->id }}">Editar</a>
							<a class="modal-ajax-link" data-mfp-src="/employee/delete/{{ $employee->id }}">Excluir</a>
						</td>
					</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>Nome</th>
					<th>Departamento</th>
					<th>Ações</th>
				</tr>
			</tfoot>
		</table>
		<a class="btn btn-primary pull-right modal-ajax-link" data-mfp-src="/employee/create">Tornar Funcionário</a>
	@else
		<div class="alert alert-danger">Nenhum funcionário</div>
	@endif
@endsection