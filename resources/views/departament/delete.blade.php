<div class="data-title">
    <h3> Inativando um departamento <i class="fa fa-bank"></i> </h3>
</div>

<b>Tem certeza de que deseja inativar o departamento {{ $departament->name }}?</b>

<div class="data-footer">
	<form method="POST" action="/departament/destroy/{{ $departament->id }}">
		{{ csrf_field() }}
		<input type="submit" class="btn btn-primary" value="Confirmar" />
	</form>
</div>