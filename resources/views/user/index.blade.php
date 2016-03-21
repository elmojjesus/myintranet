@if($users->count() > 0)
	<table>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Deficiência</th>
				<th>Educação</th>
				<th>Profissão</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->name }}</td>
					<td>{{ $user->deficiency->name }}</td>
					<td>{{ $user->education->name }}</td>
					<td>{{ $user->profession->name }}</td>
					<td><a href="user/edit/{{ $user->id }}">Editar</a>
					<a href="user/delete/{{ $user->id }}">Excluir</a></td>
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<th>Nome</th>
				<th>Deficiência</th>
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