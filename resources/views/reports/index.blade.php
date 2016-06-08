@extends('layouts.layout')

@section('title')
    Dashboard <small> / Dashboard </small>
@stop

@section('content') 

Usuários <br>
Total: {{ $totalUsers }} <br>
Sexo:{{ $usersBySex['M'] . ' ' . $usersBySex['F'] }} <br>
<hr>
Atletas <br>
Total: {{ $totalAthletes }} <br>
Sexo: {{ $athletesBySex['M'] }} <br>
<hr>
Pacientes <br>
Total: {{ $totalPacients }} <br>
Sexo: {{ $pacientsBySex['M'] }} <br>
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