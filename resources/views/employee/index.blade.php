@extends('layouts.layout')

@section('title')
    Funcionários 
@stop

@section('main_title')
    <i class="fa fa-star"></i>
    <small> / Funcionários / Buscar - Listar </small>
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
								<input type="text" name="cpf" id="cpf" data-mask="000.000.000-00" class="form-control"value="{{ isset($query['cpf']) ? $query['cpf'] : '' }}">
								
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
                                <label>Status:</label>
                                <select name="status_id" class="form-control input-sm">
                                    <option value="">--Selecione--</option>
                                    @foreach($status as $s)
                                        <option {{ isset($query['status_id']) && $query['status_id'] == $s->id ? 'selected="selected"' : '' }} value="{{ $s->id }}">{{ $s->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div id="dataTables-example_length" class="dataTables_length">
                                <label>Departamento:</label>
                                <select name="departament_id" class="form-control input-sm">
                                    <option value="">--Selecione--</option>
                                    @foreach($departaments as $departament)
                                        <option {{ isset($query['departament_id']) && $query['departament_id'] == $departament->id ? 'selected="selected"' : '' }} value="{{ $departament->id }}">{{ $departament->name }}</option>
                                    @endforeach
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
                               
	@if($employees['items'])
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>ID</th>
				    <th>Nome</th>
					<th>Departamento</th>
	                <th>Status</th>
	                <th colspan="2"></th>
				</tr>
			</thead>
			<tbody>
				@foreach($employees as $employee)
					<tr>
					    <td>{{ $employee->user_id  }}</td>
						<td>{{ $employee->name  }}</td>
						<td>{{ $employee->departament_name }}</td>
						<td>{{ $employee->status_name }}</td>
						<td>
							<a class="modal-ajax-link" data-mfp-src="/employee/edit/{{ $employee->employee_id }}">
								<center><i class="fa fa-pencil"></i></center>
							</a>
						</td>
						<td>
							@if($employee->deleted_at != null or $employee->status_id == 2)
								<a class="disabled modal-ajax-link" data-mfp-src="/employee/delete/{{ $employee->employee_id }}">
									<center><i class="fa fa-trash-o"></i></center>
								</a>
							@elseif($employee->deleted_at == null or $employee->status_id != 2)
								<a class="modal-ajax-link" data-mfp-src="/employee/delete/{{ $employee->employee_id }}">
									<center><i class="fa fa-trash-o"></i></center>
								</a>
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
				    <th>ID</th>
					<th>Nome</th>
					<th>Departamento</th>
					<th>Status</th>
					<th colspan="2"></th>
				</tr>
			</tfoot>
		</table>
		<div class="row">
            <div class="col-sm-6">
                <div aria-relevant="all" aria-live="polite" role="alert" id="dataTables-example_info" class="dataTables_info">
                Total na página: {!! $employees->count() !!}
                <br>
                Funcionários no total: {!! $employees->total() !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers">    
                    {!! $employees->appends([
                    
                        'id' => isset($query['id']) ? $query['id'] : '',
                        'cpf' => isset($query['cpf']) ? $query['cpf'] : '',
                        'name' => isset($query['name']) ? $query['name'] : '',
                        'status_id' => isset($query['status_id']) ? $query['status_id'] : '',
                        'departament_id' => isset($query['departament_id']) ? $query['departament_id'] : ''
                    
                    ])->render() !!}
                </div>
            </div>
        </div>
	@else
		<div class="alert alert-danger">Nenhum funcionário cadastrado.</div>
	@endif
		</div>

			</div>
		</div>
	</div>
</div>


@stop
