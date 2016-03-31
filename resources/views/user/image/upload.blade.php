@extends('layouts.layout')
<h2>Cadastrando imagem para perfil</h2>
<form method="POST" action="/user/image/store" enctype="multipart/form-data">
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{ $user->id }}">
	<div class="col-md-6">
		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="image" class="form-control" />
		</div>
	</div>
	<input class="btn btn-primary" type="submit" value="Salvar">
</form>
