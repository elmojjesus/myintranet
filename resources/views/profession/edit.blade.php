<form action="/profession/update/{{ $profession->id }}" method="POST">
	{{ csrf_field() }}
	<label>Nome da profissão:</label>
	<input type="text" name="name" value="{{ $profession->name }}" />
	<input type="submit" class="btn btn-primary" value="Salvar" />
</form>