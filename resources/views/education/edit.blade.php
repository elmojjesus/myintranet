<form action="/education/update/{{ $education->id }}" method="POST">
	{{ csrf_field() }}
	<label>Nome da deficiência:</label>
	<input type="text" name="name" value="{{ $education->name }}" />
	<input type="submit" class="btn btn-primary" value="Salvar" />
</form>