<form method="POST" action="/therapy/update/{{ $therapy->id }}">
	{{ csrf_field() }}
	<div class="col-md-12">
		<h2>Cadastrar Terapia</h2>
		<div class="col-md-6">
			<div class="form-group">
				<label>Nome</label>
				<input type="name" class="form-control" value="{{ $therapy->name }}">
			</div>
		</div>
		<div class="clearfix"></div>
		<input class="btn btn-primary" type="submit" value="Editar">
	</div>		
</form>
