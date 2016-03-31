Tem certeza que deseja excluir o departamento {{ $departament->name }}?
<form method="POST" action="/departament/destroy/{{ $departament->id }}">
	{{ csrf_field() }}
	<input type="submit" value="Excluir">
</form>