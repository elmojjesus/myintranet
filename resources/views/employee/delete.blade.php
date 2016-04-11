<h2>Deletar funcionário</h2>
<span>Tem certeza que deseja deletar o funcionário <b>{{ $employee->user->name }}</b>?</span>
<form method="POST" action="/employee/destroy/{{ $employee->id }}">
	{{ csrf_field() }}
	<input class="btn btn-primary pull-right" type="submit" value="Deletar" />
</form>