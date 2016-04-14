<div class="col-md-12">
	<h3>Alterar Status</h3>
	<p></p>
	<form method="POST" action="/pacient/update/{{ $pacient->id }}">
		{{ csrf_field() }}
		<div class="col-md-6">
			<div class="form-group">
				<select name="status_id" class="form-control">
					<option value="">Selecione uma opção</option>
					@foreach($status as $s)
						<option value="{{ $s->id }}" {{ $s->id == $pacient->status->id ? 'selected="selected"' : '""' }}>{{ $s->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="clearfix"></div>
		<input type="submit" class="btn btn-primary" value="Editar">
		<div class="clearfix"></div>
	</form>
</div>