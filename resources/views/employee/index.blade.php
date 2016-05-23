@extends('layouts.layout')

@section('title')
	 Funcionários da ADFP <small> / Funcionários / Buscar - Listar </small>
@stop


@section('content')

<!-- FILTROS -->
<div class="row">
	<div clas="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Filtros de busca</div>
			<div class="panel-body">
				<form>
					<div class="row">
						<div class="col-sm-4">
							<div id="dataTables-example_length" class="dataTables_length">
								
								<label>ID:</label>
								<input type="text" name="id" id="id" maxlength="3" value="{{ isset($query['id']) ? $query['id'] : '' }}" class="form-control numeric">

							</div>
						</div>
							
						<div class="col-sm-4">
							<div id="dataTables-example_length" class="dataTables_length">
								
								<label>CPF:</label>
								<input type="text" name="cpf" id="cpf" data-mask="000.000.000-00" class="form-control">
								
							</div>
						</div>

						<div class="col-sm-4">
							<div id="dataTables-example_length" class="dataTables_length">
								
								<label>Nome:</label>
								<input type="text" name="name" id="name" value="{{ isset($query['name']) ? $query['name'] : '' }}" class="form-control">
								
							</div>
						</div>

					</div>

					<br>

					<div class="row">
						<div class="col-sm-6">
							<div id="dataTables-example_length" class="dataTables_length">
								<label>Status de atividade:</label>
								<select name="status_id" class="form-control input-sm">
									<option value="">--Selecione--</option>
									
								</select>
							</div>
						</div>

						<div class="col-sm-6">
							<div id="dataTables-example_length" class="dataTables_length">
								<label>Departamento:</label>
								<select name="deficiency_id" class="form-control input-sm">
									<option value="">--Selecione--</option>
									
								</select>
							</div>
						</div>

					</div>					
					<br>

					<div class="row">
						<div class="col-lg-12">
							<div id="dataTables-example_length" class="dataTables_length">
								<a class="btn btn-default" href="/employee">Limpar busca</a>
								<input type="submit" class="btn btn-primary" value="Buscar">
							</div>
						</div>
					</div>

				</form>

			</div>
		</div>
	</div>
</div>

	<div class="clearfix"></div>
	<div class="row">
	<div clas="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Listagem de funcionários</div>
			<div class="panel-body">

				<div style="overflow-x:auto;">

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
		<div class="alert alert-danger">Nenhum funcionário cadastrado</div>
	@endif
		</div>

			</div>
		</div>
	</div>
</div>


@endsection