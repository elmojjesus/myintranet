<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
<form action="/deficiency/update/{{ $deficiency->id }}" method="POST">
	{{ csrf_field() }}
	<label>Nome da deficiência:</label>
	<input type="text" name="name" value="{{ $deficiency->name }}" />
	<input type="submit" class="btn btn-primary" value="Salvar" />
</form>