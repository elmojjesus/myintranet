<div class="data-title">
	<h3>Editar profissão: {{ $profession->name }}</h3>
</div>
<form action="/profession/update/{{ $profession->id }}" method="POST" name="editProfession">
	{{ csrf_field() }}
	<label>Nome da profissão:</label>
	<input type="text" name="name" value="{{ $profession->name }}" />
</form>

<div class="data-footer">
	<button class="btn btn-primary" onclick="formSubmit(editProfession)">Salvar</button>
</div>