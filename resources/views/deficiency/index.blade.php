@extends('layouts.layout')
@if($deficiencies->count() > 0)
	<table>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach($deficiencies as $deficiency)
				<tr>
					<td>{{ $deficiency->name }}</td>
					<td><a href="deficiency/edit/{{ $deficiency->id }}">Editar</a></td>
					<td><a href="deficiency/delete/{{ $deficiency->id }}">Excluir</a></td>
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
	<h1>Não há nenhuma deficiência cadastrada</h1>
@endif

<a href="/deficiency/create">Adicionar nova deficiência</a>