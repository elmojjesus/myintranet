@extends('layouts.layout')

@section('title')
	 Usuários da ADFP <small> / Usuários / Buscar - Listar </small>
@stop

@section('content')

@if (Session::has('flash_notification.message'))
    <div class="alert alert-{{ Session::get('flash_notification.level') }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('flash_notification.message') }}
    </div>
@endif

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
								<input type="text" name="id" value="{{ isset($query['id']) ? $query['id'] : '' }}" class="form-control">

							</div>
						</div>
							
						<div class="col-sm-4">
							<div id="dataTables-example_length" class="dataTables_length">
								
								<label>CPF:</label>
								<input type="text" name="cpf" class="form-control">
								
							</div>
						</div>

						<div class="col-sm-4">
							<div id="dataTables-example_length" class="dataTables_length">
								
								<label>Nome:</label>
								<input type="text" name="name" value="{{ isset($query['name']) ? $query['name'] : '' }}" class="form-control">
								
							</div>
						</div>

					</div>

					<br>

					<div class="row">
						<div class="col-sm-6">
							<div id="dataTables-example_length" class="dataTables_length">
								<label>Status:</label>
								<select name="status_id" class="form-control input-sm">
									<option value="">Selecione o status na associação</option>
									@foreach($status as $s)
										<option {{ isset($query['status_id']) && $query['status_id'] == $s->id ? 'selected="selected"' : '' }} value="{{ $s->id }}">{{ $s->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-sm-6">
							<div id="dataTables-example_length" class="dataTables_length">
								<label>Deficiência:</label>
								<select name="deficiency_id" class="form-control input-sm">
									<option value="">Selecione uma deficiência</option>
									@foreach($deficiencies as $deficiency)
										<option {{ isset($query['deficiency_id']) && $query['deficiency_id'] == $deficiency->id ? 'selected="selected"' : '' }} value="{{ $deficiency->id }}">{{ $deficiency->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

					</div>

					<br>

					<div class="row">
						<div class="col-lg-12">
							<div id="dataTables-example_length" class="dataTables_length">
								<a class="btn btn-default" href="/user">Limpar busca</a>
								<input type="submit" class="btn btn-primary" value="Buscar">
							</div>
						</div>
					</div>

				</form>

			</div>
		</div>
	</div>
</div>

<!-- TABELA -->
<div class="row">
	<div clas="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Listagem de usuários</div>
			<div class="panel-body">

				<div style="overflow-x:auto;">

						@if($users->count() > 0)

							<table class="table table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Nome</th>
										<th>Deficiência</th>
										<th>Esporte</th>
										<th>RH</th>
										<th>Reabilitação</th>
										<th>Associação</th>
										<th>Voluntariado</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
										<tr>
											<td> {{ $user->id }} </td>
											<td> 
												<a href="user/show/{{ $user->id }}"> 
													{{ $user->name }} 
												</a>
											</td>
											<td>{{ $user->deficiency->name }}</td>
											<td>
												<center>
													@if(!is_null($user->athlete))
														<i class="fa fa-check" style="color: green"></i>
													@else
														<i class="fa fa-times" style="color: red"></i>
													@endif
												</center>
											</td>
											<td> --- </td>
											<td> --- </td>
											<td> --- </td>
											<td> --- </td>
											<td>
												<a class="modal-ajax-link" data-mfp-src="/user/edit/{{ $user->id }}">
													<i class="fa fa-pencil"></i>
												</a>
											</td>
											<td>
												<a class="modal-ajax-link" data-mfp-src="/user/delete/{{ $user->id }}">
													<i class="fa fa-trash-o"></i>
												</a>
											</td>
										</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<th>ID</th>
										<th>Nome</th>
										<th>Deficiência</th>
										<th>Esporte</th>
										<th>RH</th>
										<th>Reabilitação</th>
										<th>Associação</th>
										<th>Voluntariado</th>
										<th></th>
										<th></th>
									</tr>
								</tfoot>
							</table>
							<div class="row">
								<div class="col-sm-6">
									<div aria-relevant="all" aria-live="polite" role="alert" id="dataTables-example_info" class="dataTables_info">Showing 1 to 10 of 57 entries</div>
								</div>

								<div class="col-sm-6">
									<div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers">{!! $users->appends($query)->render() !!}</div>
								</div>
							</div>
							
						@else
							<h1>Não há nenhum usuário cadastrado</h1>
						@endif

			</div>

			</div>
		</div>
	</div>
</div>
		
@endsection