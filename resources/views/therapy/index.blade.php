@extends('layouts.layout')
@section('content')
	<a data-mfp-src="/therapy/create" class="btn btn-primary modal-ajax-link">Adicionar Nova Terapia</a>
	@if($therapies)
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($therapies as $therapy)
					<tr>
						<td>{{ $therapy->name }}</td>
						<td>
							<button class="btn btn-link modal-ajax-link" data-mfp-src="/therapy/edit/{{ $therapy->id }}"><i class="fa fa-pencil"></i></button>
							<button class="btn btn-link modal-ajax-link" data-mfp-src="/therapy/delete/{{ $therapy->id }}"><i class="fa fa-trash">Excluir</i></button>
						</td>
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

	@endif
@endsection