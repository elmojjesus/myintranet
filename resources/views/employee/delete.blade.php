<div class="data-title">
    <h3> Inativar funcionário <i class="fa fa-star"></i> </h3>
</div>


<div class="row">
    <div clas="col-lg-12">

<span>Tem certeza que deseja inativar o funcionário <b>{{ $employee->user->name }}</b>?</span>
<form method="POST" action="/employee/destroy/{{ $employee->id }}">
	{{ csrf_field() }}
	<input class="btn btn-primary pull-right" type="submit" value="Inativar" />
</form>

</div>
</div>