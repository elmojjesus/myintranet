@extends('layouts.layout')

@section('title')
	<a class="btn btn-primary" href="{{ URL::previous() }}" type="button"> 
	<font class="myMiddle"> <i class="fa fa-arrow-left"></i>
	</font></a>
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
			<input type="file" name="image"/>
			<div class="clearfix"></div>
		</div>
		<input class="btn btn-primary pull-right" type="submit" value="Salvar">
		<a href="/user" class="btn btn-default pull-right margin-right">Ir para Lista de usuários</a>
	</div>
	<div class="clearfix"></div>
</form>
@endsection