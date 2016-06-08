@extends('layouts.layout')

@section('title')
	 Foto de perfil <i class="fa fa-user"></i>
	 <small> / Usuários / Cadastrar / Foto </small>
@stop

@section('content')

<form method="POST" action="/user/image/store" enctype="multipart/form-data">
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{ $user->id }}">
	<div class="col-md-6">
		<div class="form-group">
			<label>Selecione uma imagem</label>
			<input type="file" name="image" class="form-control" />
		</div>
	</div>
	<div class="clearfix"></div>
	<input class="btn btn-primary" type="submit" value="Salvar">
</form>
@endsection