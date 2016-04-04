@extends('layouts.layout')
<a href="/departament/create" class="btn btn-primary">Cadastrar Departamento</a>
@if($departaments)
	<table>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Responsável</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach($departaments as $departament)
				<tr>
					<td>{{ $departament->name }}</td>
					<td>{{ $departament->user ? $departament->user->name : '-----' }}</td>
					<td>
						<a href="/departament/edit/{{ $departament->id }}">Editar</a>
						<a href="/departament/delete/{{ $departament->id }}">Excluir</a>
					</td>
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<th>Nome</th>
				<th>Responsável</th>
				<th>Ações</th>
			</tr>
		</tfoot>
	</table>
@else

@endif