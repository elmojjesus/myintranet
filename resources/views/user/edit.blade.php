@extends('layouts.layout')
<form action="/user/update/{{ $user->id }}" method="POST">
	<a href="/user/image/upload/{{ $user->id }}">Alterar foto de perfil</a>
	<br>
	<input type="hidden" name="edit" value="xumbalacatualua" >
	{{ csrf_field() }}
	<label>Nome:</label>
	<input type="text" name="name" value="{{ $user->name }}" />
	<br>
	<label>Email:</label>
	<input type="text" name="email" value="{{ $user->email }}" />
	<br>
	<label>Senha: (Deixe em branco para manter a senha)</label>
	<input type="password" name="password" />
	<br>
	<label>Deficiência:</label>
	<select name="deficiency_id">
		@foreach($deficiencies as $deficiency)
			<option {{ $deficiency->id == $user->deficiency->id ? 'selected' : '' }} value="{{ $deficiency->id }}" >{{ $deficiency->name }}</option>
		@endforeach
	</select>
	<br>
	<label>Data de nascimento:</label>
	<input type="text" name="birthDate" value="{{ $user->birthDate }}">
	<br>
	<label>Sexo:</label>
	<input type="radio" name="sex" value="M" {{ $user->sex == 'M' ? 'checked' : '' }}>M	
	<input type="radio" name="sex" value="F" {{ $user->sex == 'F' ? 'checked' : '' }}>F
	<br>
	<label>Nacionalidade:</label>
	<input type="text" name="nationality" value="{{ $user->nationality }}">
	<br>
	<label>Nome da mãe:</label>
	<input type="text" name="mother" value="{{ $user->mother }}">
	<br>
	<label>Nome do Pai:</label>
	<input type="text" name="father" value="{{ $user->father }}">
	<br>
	<label>Escolaridade:</label>
	<select name="education_id">
		@foreach($educations as $education)
			<option {{ $education->id == $user->education->id ? 'selected' : '' }} value="{{ $education->id }}">{{ $education->name }}</option>
		@endforeach
	</select>
	<br>
	<label>Profissão:</label>
	<select name="profession_id">
		@foreach($professions as $profession)
			<option {{ $profession->id == $user->profession->id ? 'selected' : '' }} value="{{ $profession->id }}">{{ $profession->name }}</option>
		@endforeach
	</select>
	<br>
	<label>Voluntário:</label>
	<input type="checkbox" name="voluntary" {{ $user->voluntary ? 'checked' : '' }}>
	<p></p>
	<input type="submit" class="btn btn-primary" value="Salvar" />
</form>