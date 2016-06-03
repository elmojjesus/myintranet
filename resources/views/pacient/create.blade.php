@extends('layouts.layout')
@section('title')
	 Cadastre um paciente <i class="fa fa-user"></i>
	 <small> / Pacientes / Cadastrar </small>
@stop
@section('content')
	<form method="POST" action="/pacient/store">
		{{ csrf_field() }}

<div class="row">
	<div clas="col-md-12">
		<div class="col-md-6">
			<div class="form-group">
				<label>Tornar Paciente</label>
				<select name="user_id" class="form-control">
					<option>Selecione um usuário</option>
					@foreach ($users as $user)
						<option value="{{ $user->id }}">{{ $user->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Status</label>
				<select name="status_id" class="form-control">
					<option>Selecione um status</option>
					@foreach ($status as $s)
						<option value="{{ $s->id }}">{{ $s->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		
		<input class="btn btn-primary" value="Salvar" type="submit">
		</div>
		</div>
	</form>
@endsection