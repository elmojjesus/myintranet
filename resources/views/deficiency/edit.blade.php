<div class="data-title">
	<h3>Editar deficiência: {{ $deficiency->name }}</h3>
</div>
<form action="/deficiency/update/{{ $deficiency->id }}" method="POST" name="editDeficiency">
	{{ csrf_field() }}
	<label>Nome da deficiência:</label>
	<input type="text" name="name" value="{{ $deficiency->name }}" />
	
</form>
<div class="data-footer">
	<button class="btn btn-primary" onclick="formSubmit(editDeficiency)">Salvar</button>
</div>