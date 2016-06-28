<div class="data-title">
    <h3> Inativando um voluntário <i class="fa fa-heart"></i> </h3>
</div>

<b>Tem certeza de que deseja inativar o(a) voluntário(a) {{ $volunteer->user->name }}?</b>

<div class="data-footer">
	<form method="POST" action="/volunteer/destroy/{{ $volunteer->id }}">
		{{ csrf_field() }}
		<input type="submit" class="btn btn-primary" value="Confirmar" />
	</form>
</div>