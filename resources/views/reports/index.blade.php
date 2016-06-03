@extends('layouts.layout')

@section('title')
    Relatórios <small> / Relatórios </small>
@stop

@section('content') 

<div class="row">
	<div class="col-md-12">
		<div class="col-md-4">
	<a class="btn btn-success" href="/reports/user">Relatório Usuários</a> 
	</div>
	<div class="col-md-4">
	<a class="btn btn-success" href="/reports/athletes">Relatório de Atletas</a> 
	</div>
	<div class="col-md-4">
	<a class="btn btn-success" href="/reports/pacients">Relatório de Pacientes</a>
	</div>
	     </div>
            </div>


@endsection	