@extends('layouts.layout')
@section('title')
	 Perfis de Acesso <small> / Perfis de Acesso </small>
@stop
@section('content')
	<div class="row">
	    <div clas="col-lg-12">
	    	<div class="col-md-6">
		        <div class="panel panel-default">
		            <div class="panel-heading">Níveis de permissões</div>
		            <div class="panel-body">
		            	<form method="POST" action="/role/store">
	            			{{ csrf_field() }}
		            		<div class="form-group">
		            			<label>Cadastre uma nova permissão:</label>
		            			<input class="form-control" name="name">
		            		</div>
		            		<input type="submit" class="btn btn-primary" value="Cadastrar">
	            		</form>
	            		<div class="clearfix"></div>
	            		<hr>
	            		Lista de Permissões
	            		@if($roles->count() > 0)
		            		<table class="table table-striped table-bordered table-hover">
		            			<thead>
		            				<tr>
		            					<th>Nome</th>
		            					<th class="text-center">Ações</th>
		            				</tr>
		            			</thead>
		            			<tbody>
		            				@foreach($roles as $role)
		            					<tr>
		            						<td>{{ $role->name }}</td>
		            						<td class="text-center"><a class="modal-ajax-link" data-mfp-src="/roles/edit/{{ $role->id }}"><i class="fa fa-pencil"></i></a></td>
		            					</tr>
		            				@endforeach
		            			</tbody>
		            		</table>
		            		{!! $roles->appends($query)->render() !!}
        				@else
        					<div class="alert alert-warning">
        						Não há nenhuma permissão cadastrada até o momento
        					</div>
        				@endif
		            </div>
		        </div>
	        </div>
	        <div class="col-md-6">
		        <div class="panel panel-default">
		            <div class="panel-heading">Cadastrar acesso</div>
		            <div class="panel-body">
		            	<form method="POST" action="/profiles/store">
	            			{{ csrf_field() }}
		            		<div class="form-group">
		            			<label>Permissão de acesso:</label>
		            			<select name="role_id" class="form-control">
		            				<option value="">Selecione a permissão</option>
		            				@foreach($roles as $role)
		            					<option value="{{ $role->id }}">{{ $role->name }}</option>
		            				@endforeach
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<label>Usuário</label>
		            			<select name="user_id" class="form-control">
		            				<option value="">Selecione o usuário</option>
		            				@foreach($users as $user)
		            					<option value="{{ $user->id }}">{{ $user->name }}</option>
		            				@endforeach
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<label>Senha</label>
		            			<input name="password" type="password" class="form-control">
		            		</div>
		            		<div class="form-group">
		            			<label>Confirmação de senha</label>
		            			<input name="password_confirm" type="password" class="form-control">
		            		</div>
		            		<input type="submit" class="btn btn-primary" value="Cadastrar">
	            		</form>
	            		<div class="clearfix"></div>
		            </div>
		        </div>
	        </div>
	        <div class="col-md-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">Acessos cadastrados</div>
		            <div class="panel-body">
		            	<table class="table table-hover table-striped table-bordered">
		            		<thead>
		            			<tr>
		            				<th>Usuário</th>
		            				<th>Perfil</th>
		            				<th>Ações</th>
		            			</tr>
		            		</thead>
		            		<tbody>
		            			@foreach($profiles as $profile)
			            			<tr>
			            				<td>{{ $profile->user->name }}</td>
			            				<td>{{ $profile->role->name }}</td>
			            				<td><i class="fa fa-pencil"></i></td>
			            			</tr>
		            			@endforeach
		            		</tbody>
		            	</table>
		            	{!! $profiles->appends($query)->render() !!}
		            </div>
		        </div>
	        </div>
    	</div>
    </div>

@endsection