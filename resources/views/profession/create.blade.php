@extends('layouts.layout')
<form action="/profession/store" method="POST">
	{{ csrf_field() }}
	<label>Nome da profissão:</label>
	<input type="text" name="name" />
	<input type="submit" class="btn btn-primary" value="Salvar" />
</form>