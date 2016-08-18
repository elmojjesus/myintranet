<div class="data-title">
    <h3> Inativando um paciente <i class="fa fa-wheelchair"></i> </h3>
</div>

<b>Tem certeza de que deseja inativar o(a) paciente {{ $pacient->user->name }}?</b>

<div class="data-footer">
	<form action="pacient/destroy/{{ $pacient->id }}" method="POST" >
		{{ csrf_field() }}
		<input type="submit" class="btn btn-primary" value="Confirmar" />
	</form>
</div>