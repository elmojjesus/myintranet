@extends('layouts.layout')
@if($educations->count() > 0)
	<table>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach($educations as $education)
				<tr>
					<td>{{ $education->name }}</td>
					<td><a href="education/edit/{{ $education->id }}">Editar</a></td>
					<td><a href="education/delete/{{ $education->id }}">Excluir</a></td>
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
	<h1>Não há nenhuma educação cadastrada</h1>
@endif

<a href="/education/create">Adicionar nova educação</a>