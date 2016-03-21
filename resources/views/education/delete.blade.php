<h3>Tem certeza que deseja deletar a educação: {{ $education->name }}?</h3>
<form action="/education/destroy/{{$education->id}}" method="POST" >
	{{ csrf_field() }}
	<input type="submit" class="btn btn-primary" value="Confirmar" />
</form>