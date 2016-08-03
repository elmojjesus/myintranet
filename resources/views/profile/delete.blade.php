<div class="data-title">
    <h3> Removendo um acesso </h3>
</div>

<b>Tem certeza de que deseja remover o acesso de {{ $profile->user->name }}?</b>

<div class="data-footer">
	<form method="POST" action="/profiles/destroy/{{ $profile->id }}">
		{{ csrf_field() }}
		<input type="submit" class="btn btn-primary" value="Confirmar" />
	</form>
</div>