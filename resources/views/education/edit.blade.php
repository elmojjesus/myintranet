<form action="/education/update/{{ $education->id }}" method="POST" name="editEducation">
	{{ csrf_field() }}
	<label>Nome da deficiência:</label>
	<input type="text" name="name" value="{{ $education->name }}" />
	<button class="btn btn-primary" onclick="formSubmit(editEducation)">Salvar</button>
</form>