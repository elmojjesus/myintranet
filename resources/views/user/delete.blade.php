<h3>Tem certeza que deseja inativar o usuário: {{ $user->name }}?</h3>
<form action="/user/destroy/{{$user->id}}" method="POST" >
	{{ csrf_field() }}
	<input type="submit" class="btn btn-primary" value="Confirmar" />
</form>