@extends('layouts.layout')

@section('title')
Estatísticas 
@stop

@section('main_title')
<i class="fa fa-bar-chart-o"></i>
<small> / Estatísticas </small>
@stop

@section('content') 

<div class="row">
    
    <div class="col-md-4">
        <div class="panel panel-default">
            <h1><div class="text-center"><i class="fa fa-users" style="color: #08698A"></i></div></h1>
            <h3 class="text-center">Usuários</h3>
            <h4 class="text-center">Total: {{ $totalUsers }}</h4>
            <h4 class="text-center">Masculino: {{ $usersBySex['M'] }}</h4>
            <h4 class="text-center">Feminino: {{ $usersBySex['F'] }}</h4>
            <br/>
            <div style="text-align: center">
                <a class="btn btn-success" href="/reports/user">Ver detalhes</a>
            </div> 
            <br/>
        </div>  
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <h1><div class="text-center"><i class="fa fa-trophy" style="color: #08698A"></i></div></h1>
            <h3 class="text-center">Atletas</h3>
            <h4 class="text-center">Total: {{ $totalAthletes }}</h4>
            <h4 class="text-center">Masculino: {{ $athletesBySex['M'] }}</h4>
            <h4 class="text-center">Feminino: {{ $athletesBySex['F'] }}</h4>
            <br/>
            <div style="text-align: center">
                <a class="btn btn-success" href="/reports/athletes">Ver detalhes</a> 
            </div>
            <br/>
        </div> 
    </div> 


    <div class="col-md-4">
        <div class="panel panel-default">
            <h1><div class="text-center"><i class="fa fa-wheelchair" style="color: #08698A"></i></div></h1>
            <h3 class="text-center">Pacientes</h3>
            <h4 class="text-center">Total: {{ $totalPacients }} </h4>
            <h4 class="text-center">Masculino: {{ $pacientsBySex['M'] }}</h4>
            <h4 class="text-center">Feminino: {{ $pacientsBySex['F'] }}</h4>
            <br/>
            <div style="text-align: center">
                <a class="btn btn-success" href="/reports/pacients">Ver detalhes</a>
            </div>
            <br/>
        </div>
    </div>

</div>

@endsection	