@extends('layouts.layout')
<form method="POST" action="/departament/update/{{ $departament->id }}">
	{{ csrf_field() }}
	<div class="form-group">
		<label>Nome:</label>
		<input type="text" name="name" value="{{ $departament->name }}">	
	</div>
	<div class="form-group">
		<label>Responsável:</label>
		<select type="text" name="user_id">
			<option value=""></option>
			@foreach($users as $user)
				<option value="{{ $user->id }}" {{ $user->id == $departament->user->id ? 'selected="seletected"' : '' }}>{{ $user->name }}</option>
			@endforeach
		</select>
	</div>
	<input type="submit" class="btn btn-primary" value="Salvar">
</form>