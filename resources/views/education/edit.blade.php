<div class="data-title">
	<h3> Editar educação: {{ $education->name }} <i class="fa fa-graduation-cap"></i> </h3>
</div>

<form action="/education/update/{{ $education->id }}" method="POST" name="editEducation">
	{{ csrf_field() }}
	<label>Nome da deficiência:</label>
	<input type="text" name="name" value="{{ $education->name }}" />
</form>

<div class="data-footer">
	<button class="btn btn-primary" onclick="formSubmit(editEducation)">Salvar</button>
</div>