<div class="data-title">
    <h3> Inativando um funcionário <i class="fa fa-star"></i> </h3>
</div>

<b>Tem certeza de que deseja inativar o(a) funcionário(a) {{ $employee->user->name }}?</b>

<div class="data-footer">
	<form method="POST" action="/employee/destroy/{{ $employee->id }}">
		{{ csrf_field() }}
		<input type="submit" class="btn btn-primary" value="Confirmar" />
	</form>
</div>