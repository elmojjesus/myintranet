
<form action="/user/update/{{ $user->id }}" method="POST">
	<a href="/user/image/upload/{{ $user->id }}">Alterar foto de perfil</a>
	<br>
	<input type="hidden" name="edit" value="xumbalacatualua" >
	{{ csrf_field() }}

	<div class="col-md-6">
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" class="form-control" name="name" value="{{ $user->name }}" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Email:</label>
			<input class="form-control" type="text" name="email" value="{{ $user->email }}" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Senha: (Deixe em branco para manter a senha)</label>
			<input type="password" class="form-control" name="password" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Deficiência:</label>
			<select name="deficiency_id" class="form-control">
				@foreach($deficiencies as $deficiency)
					<option {{ $deficiency->id == $user->deficiency->id ? 'selected' : '' }} value="{{ $deficiency->id }}" >{{ $deficiency->name }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Data de nascimento:</label>
			<input type="text" name="birthDate" class="form-control" value="{{ $user->birthDate }}">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Sexo:</label>
			<input type="radio" name="sex" value="M" {{ $user->sex == 'M' ? 'checked' : '' }}>M	
			<input type="radio" name="sex" value="F" {{ $user->sex == 'F' ? 'checked' : '' }}>F
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Nacionalidade:</label>
			<input type="text" name="nationality" class="form-control" value="{{ $user->nationality }}">
		</div>
	</div>
	<br>
	<div class="col-md-6">
		<div class="form-group">
			<label>Nome da mãe:</label>
			<input type="text" name="mother" value="{{ $user->mother }}" class="form-control">
		</div>
	</div>
	<br>
	<div class="col-md-6">
		<div class="form-group">
			<label>Nome do Pai:</label>
			<input type="text" name="father" value="{{ $user->father }}" class="form-control">
		</div>
	</div>
	<br>
	<div class="col-md-6">
		<div class="form-group">
			<label>Escolaridade:</label>
			<select name="education_id" class="form-control">
				@foreach($educations as $education)
					<option {{ $education->id == $user->education->id ? 'selected' : '' }} value="{{ $education->id }}">{{ $education->name }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Profissão:</label>
			<select name="profession_id" class="form-control">
				@foreach($professions as $profession)
					<option {{ $profession->id == $user->profession->id ? 'selected' : '' }} value="{{ $profession->id }}">{{ $profession->name }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Voluntário:</label>
			<input type="checkbox" name="voluntary" {{ $user->voluntary ? 'checked' : '' }}>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>RG</label>
			<input type="text" name="rg" class="form-control" value="{{ $user->document->rg }}" 	/>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>CPF</label>
			<input type="text" name="cpf" class="form-control" value="{{ $user->document->cpf }}" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Passaporte</label>
			<input type="text" name="passport" class="form-control" value="{{ $user->document->passport }}" />
		</div>
	</div>
	<input type="submit" class="btn btn-primary" value="Salvar" />
</form>
