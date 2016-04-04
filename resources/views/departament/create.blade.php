@extends('layouts.layout')
<form method="POST" action="/departament/store">
	{{ csrf_field() }}
	<div class="form-group">
		<label>Nome:</label>
		<input type="text" name="name" class="form-control" />
	</div>
	<div class="form-group">
		<label>Responsável</label>
		<select name="user_id" class="form-control">
			<option value=""></option>
			@foreach($users as $user)
				<option value="{{ $user->id }}">{{ $user->name }}</option>
			@endforeach
		</select>
	</div>
	<input type="submit" class="btn btn-primary" value="Salvar">
</form>