@extends('layouts.layout')
@section('content')
@if (Session::has('flash_notification.message'))
    <div class="alert alert-{{ Session::get('flash_notification.level') }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        {{ Session::get('flash_notification.message') }}
    </div>
@endif
<form>
	<label>Nome:</label>
	<input type="text" name="name" >
	<label>Deficiência:</label>
	<select name="deficiency_id">
		<option value="">Selecione uma deficiência</option>
		@foreach($deficiencies as $deficiency)
			<option value="{{ $deficiency->id }}">{{ $deficiency->name }}</option>
		@endforeach
	</select>
	<input type="submit" value="Buscar">
</form>
<br>
@if($users->count() > 0)
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th></th>
				<th>Nome</th>
				<th>Deficiência</th>
				<th>Esporte</th>
				<th>Educação</th>
				<th>Profissão</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td><img src="{{ '/images/profile/' . $user->image }}" height="40" width="40"></td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->deficiency->name }}</td>
					<td>
						@if(!is_null($user->athlete))
							@if(!is_null($user->athlete->athleteSport))
								<ul>
									@foreach ($user->athlete->athleteSport as $athleteSport)
										@if(  !is_null($athleteSport->sport) )
											<li>{{ $athleteSport->sport->name }} </li>
										@endif
									@endforeach
								</ul>
							@endif
						@endif
						<a href="/athlete/create/{{ $user->id }}"> Definir esporte </a>
					</td>
					<td>{{ $user->education->name }}</td>
					<td>{{ $user->profession->name }}</td>
					<td><a href="user/edit/{{ $user->id }}">Editar</a>
					<a href="user/delete/{{ $user->id }}">Excluir</a></td>
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
			<th></th>
				<th>Nome</th>
				<th>Deficiência</th>
				<th>Esporte</th>
				<th>Educação</th>
				<th>Profissão</th>
				<th>Ações</th>
			</tr>
		</tfoot>
	</table>
	{!! $users->render() !!}
@else
	<h1>Não há nenhum usuário cadastrado</h1>
@endif

<a href="/user/create">Adicionar novo usuário</a>
@endsection