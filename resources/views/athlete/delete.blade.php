<div class="data-title">
    <h3> Inativando um atleta <i class="fa fa-trophy"></i> </h3>
</div>

<b>Tem certeza de que deseja inativar o(a) atleta {{ $athlete->user->name }}?</b>

<div class="data-footer">
	<form action="athlete/destroy/{{ $athlete->id }}" method="POST" >
		{{ csrf_field() }}
		<input type="submit" class="btn btn-primary" value="Confirmar" />
	</form>
</div>