@extends('layouts.layout')
@section('content')
<form action="/user/store" method="POST">
	{{ csrf_field() }}
	<h2>Cadastrar Usuário</h2>
	<div class="col-md-6">
		<div class="form-group">
		<label>Nome:</label>
		<input type="text" class="form-control" name="name" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Email:</label>
		<input type="text" class="form-control" name="email" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Senha:</label>
		<input type="password" class="form-control" name="password" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Confirmar Senha:</label>
		<input type="password" class="form-control" name="password_confirm" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Deficiência:</label>
		<select name="deficiency_id"class="form-control" >	
			@foreach($deficiencies as $deficiency)
				<option value="{{ $deficiency->id }}">{{ $deficiency->name }}</option>
			@endforeach
		</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Data de nascimento:</label>
		<input type="text" class="form-control" name="birthDate">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Sexo:</label>
		<input type="radio" name="sex" value="M">M	
		<input type="radio" name="sex" value="F">F
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Nacionalidade:</label>
		<input type="text" class="form-control" name="nationality">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Nome da mãe:</label>
		<input type="text" class="form-control" name="mother">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Nome do Pai:</label>
		<input type="text" class="form-control" name="father">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Escolaridade:</label>
		<select class="form-control" name="education_id">
			@foreach($educations as $education)
				<option value="{{ $education->id }}">{{ $education->name }}</option>
			@endforeach
		</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Profissão:</label>
		<select class="form-control" name="profession_id">
			@foreach($professions as $profession)
				<option value="{{ $profession->id }}">{{ $profession->name }}</option>
			@endforeach
		</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Voluntário:</label>
		<input type="checkbox" class="form-control" name="voluntary">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Status:</label>
		<select class="form-control" name="status_id">
			@foreach($status as $s)
				<option value="{{ $s->id }}">{{ $s->name }}</option>
			@endforeach
		</select>
		</div>
	</div>
	<div class="clearfix"></div>
	<input type="submit" class="btn btn-primary" value="Salvar" />
</form>
@endsection