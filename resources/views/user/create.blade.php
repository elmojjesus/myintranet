@extends('layouts.layout')

<form action="/user/store" method="POST">
	{{ csrf_field() }}
	<label>Nome:</label>
	<input type="text" name="name" />
	<br>
	<label>Email:</label>
	<input type="text" name="email" />
	<br>
	<label>Senha:</label>
	<input type="password" name="password" />
	<br>
	<label>Confirmar Senha:</label>
	<input type="password" name="password_confirm" />
	<br>
	<label>Deficiência:</label>
	<select name="deficiency_id">	
		@foreach($deficiencies as $deficiency)
			<option value="{{ $deficiency->id }}">{{ $deficiency->name }}</option>
		@endforeach
	</select>
	<br>
	<label>Data de nascimento:</label>
	<input type="text" name="birthDate">
	<br>
	<label>Sexo:</label>
	<input type="radio" name="sex" value="M">M	
	<input type="radio" name="sex" value="F">F
	<br>
	<label>Nacionalidade:</label>
	<input type="text" name="nationality">
	<br>
	<label>Nome da mãe:</label>
	<input type="text" name="mother">
	<br>
	<label>Nome do Pai:</label>
	<input type="text" name="father">
	<br>
	<label>Escolaridade:</label>
	<select name="education_id">
		@foreach($educations as $education)
			<option value="{{ $education->id }}">{{ $education->name }}</option>
		@endforeach
	</select>
	<br>
	<label>Profissão:</label>
	<select name="profession_id">
		@foreach($professions as $profession)
			<option value="{{ $profession->id }}">{{ $profession->name }}</option>
		@endforeach
	</select>
	<br>
	<label>Voluntário:</label>
	<input type="checkbox" name="voluntary">
	<br>
	<label>Voluntário:</label>
	<select name="status_id">
		@foreach($status as $s)
			<option value="{{ $s->id }}">{{ $s->name }}</option>
		@endforeach
	</select>
	<p></p>
	<input type="submit" class="btn btn-primary" value="Salvar" />
</form>