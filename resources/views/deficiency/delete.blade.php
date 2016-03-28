@extends('layouts.layout')
<h3>Tem certeza que deseja deletar a deficiência: {{ $deficiency->name }}?</h3>
<form action="/deficiency/destroy/{{$deficiency->id}}" method="POST" >
	{{ csrf_field() }}
	<input type="submit" class="btn btn-primary" value="Confirmar" />
</form>