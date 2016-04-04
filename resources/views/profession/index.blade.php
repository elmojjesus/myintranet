@extends('layouts.layout')
@if($professions->count() > 0)
	<table>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach($professions as $profession)
				<tr>
					<td>{{ $profession->name }}</td>
					<td><a href="profession/edit/{{ $profession->id }}">Editar</a></td>
					<td><a href="profession/delete/{{ $profession->id }}">Excluir</a></td>
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<th>Nome</th>
				<th>Ações</th>
			</tr>
		</tfoot>
	</table>
@else
	<h1>Não há nenhuma profissão cadastrada</h1>
@endif

<a href="/profession/create">Adicionar nova profissão</a>