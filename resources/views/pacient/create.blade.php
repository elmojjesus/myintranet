@extends('layouts.layout')
@section('content')
	<form method="POST" action="/pacient/store">
		{{ csrf_field() }}
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
					<option>Selecione um usuário</option>
					@foreach ($status as $s)
						<option value="{{ $s->id }}">{{ $s->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<input class="btn btn-primary" type="submit">
	</form>
@endsection