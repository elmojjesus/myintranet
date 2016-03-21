<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
<form action="/education/store" method="POST">
	{{ csrf_field() }}
	<label>Nome educação:</label>
	<input type="text" name="name" />
	<input type="submit" class="btn btn-primary" value="Salvar" />
</form>