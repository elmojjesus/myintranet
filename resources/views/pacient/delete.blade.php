<h4>Tem certeza que deseja deletar o paciente <b>{{ $pacient->user->name }}</b>?</h4>
<form method="POST" action="/pacient/destroy/{{ $pacient->id }}">
	{{ csrf_field() }}
	<input class="btn btn-primary" type="submit" value="Confirmar">
</form>