<h2>Editar Funcionário</h2>
<form method="POST" action="/employee/update/{{ $employee->id }}">
	{{ csrf_field() }}
	<div class="col-md-6">
		<div class="form-group">
			<label>Usuário</label>
			<select name="user_id" class="form-control">
				<option value=""></option>
				@foreach($users as $user)
					<option value="{{ $user->id }}" {{ $employee->user->id == $user->id ? 'selected="selected"' : '' }}>{{ $user->name }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Departamento</label>
			<select name="departament_id" class="form-control">
				<option value=""></option>
				@foreach($departaments as $departament)
					<option value="{{ $departament->id }}" {{ $employee->departament->id == $departament->id ? 'selected="selected"' : '' }}>{{ $departament->name }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<input class="btn btn-primary pull-right" type="submit" value="Salvar">
</form>
