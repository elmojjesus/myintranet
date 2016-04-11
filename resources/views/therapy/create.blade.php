<form method="POST" action="/therapy/store">
	{{ csrf_field() }}
	<div class="col-md-12">
		<h2>Cadastrar Terapia</h2>
		<div class="col-md-6">
			<div class="form-group">
				<label>Nome</label>
				<input type="text" name="name" class="form-control">
			</div>
		</div>
	</div>
	<input type="submit" class="btn btn-primary" value="Salvar">
</form>
