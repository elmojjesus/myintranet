@extends('layouts.layout')
@if($employees)
	<table>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Departamento</th>
			</tr>
		</thead>
		<tbody>
			@foreach($employees as $employee)
				<tr>
					<td>{{ $employee->user->name  }}</td>
					<td>{{ $employee->departament->name }}</td>
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<th>Nome</th>
				<th>Departamento</th>
			</tr>
		</tfoot>
	</table>
@else
	<div class="alert alert-danger">Nenhum funcionário</div>
@endif