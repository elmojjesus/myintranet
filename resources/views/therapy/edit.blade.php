<form method="POST" action="/therapy/update/{{ $therapy->id }}">

<div class="data-title">
    <h3> Editar terapia <i class="fa fa-trophy"></i> </h3>
</div>

 <div class="row">
    <div class="col-lg-12">
                <label>Nome</label>
				<input type="name" class="form-control" value="{{ $therapy->name }}">
    </div>
  </div>

<div class="data-footer">
    <input class="btn btn-primary" type="submit" value="Editar">
  </div>  
	
</form>
