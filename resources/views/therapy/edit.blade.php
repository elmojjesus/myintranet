<form method="POST" action="/therapy/update/{{ $therapy->id }}">
	{{ crsf_field() }}
	<div class="col-md-12">
		<h2>Cadastrar Terapia</h2>
		<div class="col-md-6">
			<div class="form-group">
				<label>Nome</label>
				<input type="name" class="form-control" value="{{ $therapy->name }}">
			</div>
		</div>
	</div>		
</form>
