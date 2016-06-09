@extends('layouts.layout')

@section('title')
    Dashboard <small> / Dashboard </small>
@stop

@section('content') 


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
		<div class="panel panel-default">
		<h4 class="text-center">Usuários</h4>
		<h3 class="text-center">Total: {{ $totalUsers }}</h3>
		<h3 class="text-center">Sexo: {{ $usersBySex['M'] . ' ' . $usersBySex['F'] }}</h3>

	<a class="btn btn-success" href="/reports/user">Relatório Usuários</a> 
	<p></p>
            </div>  
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