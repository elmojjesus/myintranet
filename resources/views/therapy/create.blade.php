<form method="POST" action="/therapy/store">
	{{ csrf_field() }}
	<div class="row">
	<div class="col-md-12">
		<div class="col-md-6">
		<div class="panel-heading"> Cadastrar terapia </div>
			<div class="form-group">
				<label>Nome</label>
				<input type="text" name="name" class="form-control">
			</div>
		</div>
	</div>
	<input type="submit" class="btn btn-primary" value="Salvar">
	</div>
</form>
