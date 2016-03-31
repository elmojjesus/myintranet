@extends('layouts.layout')
<h2>Cadastrar documento para {{ $user->name }}</h2>
<form method="POST" action="/document/store">
	{{ csrf_field() }}
	<input type="hidden" name="user_id" value="{{ $user->id }}" />
	<div class="form-group">
		<label>RG</label>
		<input type="text" name="rg" class="form-control" />
	</div>
	<div class="form-group">
		<label>CPF</label>
		<input type="text" name="cpf" class="form-control" />
	</div>
	<div class="form-group">
		<label>Passaporte</label>
		<input type="text" name="passport" class="form-control" />
	</div>
	<input class="btn btn-primary" type="submit" value="Salvar" />
</form>