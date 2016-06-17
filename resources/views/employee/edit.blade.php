
<div class="data-title">
    <h3> Editando informações do funcionário <i class="fa fa-star"></i> </h3>
</div>

<form method="POST" action="/employee/update/{{ $employee->id }}">
<div class="row">
    <div clas="col-lg-12">
        <div class="panel panel-default">
        <div class="panel-heading">
        <div class="panel-body">

	{{ csrf_field() }}
	<div class="col-md-6">
		<div class="form-group">
			<label>Funcionário</label>
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
	</div>
	</div>
	</div>
	</div>
	</div>
	<input class="btn btn-primary pull-right" type="submit" value="Salvar">
</form>
