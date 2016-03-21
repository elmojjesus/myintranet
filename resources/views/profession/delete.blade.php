<h3>Tem certeza que deseja deletar a profissão: {{ $profession->name }}?</h3>
<form action="/profession/destroy/{{$profession->id}}" method="POST" >
	{{ csrf_field() }}
	<input type="submit" class="btn btn-primary" value="Confirmar" />
</form>