@extends('layouts.layout')
@section('title')
	 Perfis de Acesso <small> / Perfis de Acesso </small>
@stop
@section('content')
	<div class="row">
	    <div clas="col-lg-12">
	        <div class="col-md-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">Cadastrar acesso</div>
		            <div class="panel-body">
		            	<form method="POST" action="/profiles/store">
	            			{{ csrf_field() }}
	            			<div class="col-md-6">
			            		<div class="form-group">
			            			<label>Permissão de acesso:</label>
			            			<label class="hidden" id="lblPermission" style="color: red"> Este campo é obrigatório
			            			</label>
			            			<select name="role_id" class="form-control" id="permission">
			            				<option value="">Selecione a permissão</option>
			            				@foreach($roles as $role)
			            					<option value="{{ $role->id }}">{{ $role->name }}</option>
			            				@endforeach
			            			</select>
			            		</div>
	            			</div>
	            			<div class="col-md-6">
			            		<div class="form-group">
			            			<label>Usuário</label>
			            			<label class="hidden" id="lblUser_id" style="color: red"> Este campo é obrigatório
			            			</label>
			            			<select name="user_id" class="form-control" id="user_id">
			            				<option value="">Selecione o usuário</option>
			            				@foreach($users as $user)
			            					<option value="{{ $user->id }}">{{ $user->name }}</option>
			            				@endforeach
			            			</select>
			            		</div>
	            			</div>
							</label>
	            			<div class="col-md-6">
			            		<div class="form-group">
			            			<label>Senha</label>
			            			<label class="hidden" id="lblRequirePass" style="color: red"> Este campo é obrigatório
			            			</label>
			            			<input name="password" type="password" id="password" class="form-control">
			            		</div>
	            			</div>
	            			<div class="col-md-6">
			            		<div class="form-group">
			            			<label>Confirmação de senha</label>
			            			<input type="password" class="form-control" id="password_confirm" onblur="validaSenha();">
			            		</div>
	            			</div>
	            			<div class="col-md-12">
	            				<label class="hidden" id="lblPassword" style="color: red"> 	Senhas não conferem, por favor verifique
	            			</div>
		            		<input type="submit" class="btn btn-primary" onclick="return validaCampo();" value="Cadastrar">
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
			            				<td>
			            					<a class="modal-ajax-link" data-mfp-src="/profiles/edit/{{ $profile->id }}">
			            						<i class="fa fa-pencil"></i>
		            						</a>
		            						<a class="modal-ajax-link" data-mfp-src="/profiles/delete/{{ $profile->id }}">
			            						<i class="fa fa-trash-o"></i>
		            						</a>
		            					</td>
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
<script>
    function validaCampo() {
    	var error = true;
    	if ($('#permission').val() == '') {
    		$('#permission').addClass('danger');
    		$('#lblPermission').removeClass('hidden');
    		error = false;
    	} else {
    		$('#permission').removeClass('danger');
    		$('#lblPermission').addClass('hidden');
    	}

    	if ($('#user_id').val() == '') {
    		$('#user_id').addClass('danger');
    		$('#lblUser_id').removeClass('hidden');
    		error = false;
    	} else {
    		$('#user_id').removeClass('danger');
    		$('#lblUser_id').addClass('hidden');
    	}

		if ($('#password').val() == '') {
    		$('#password').addClass('danger');
    		$('#lblRequirePass').removeClass('hidden');
    		error = false;
    	} else {
    		$('#password').removeClass('danger');
    		$('#lblRequirePass').addClass('hidden');
    		if ($('#password').val() != $('#password_confirm').val()) {
    			error = false;
    			validaSenha();
    		}
    	}

    	return error;

    }

		function validaSenha() {
			if ($('#password').val() != $('#password_confirm').val()) {
				$('#lblPassword').removeClass('hidden');
				$('#password').addClass('danger');
				$('#password_confirm').addClass('danger');
			} else {
				$('#lblPassword').addClass('hidden');
				$('#password').removeClass('danger');
				$('#password_confirm').removeClass('danger');
			}
		}

</script>
@endsection