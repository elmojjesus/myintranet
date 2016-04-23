@extends('layouts.layout')
@section('content')
	<script src="{{ URL::asset('assets/js/jquery-1.10.2.js') }}"></script>
	<script src="{{ URL::asset('assets/js/highcharts/highcharts.js') }}"></script>
	
	<h2>Relatórios de Usuários</h2>
	<p></p>
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="panel panel-default">
                <h4 class="text-center">Quantidade total de usuários</h4>
                <h3 class="text-center">{{ $totalUsers }}</h3>
                <p></p>
            </div>    
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <h4 class="text-center">Quantidade por sexo</h4>
                <h3 class="text-center">Masculino: {{ $usersBySex['M'] }}</h3>
                <h3 class="text-center">Feminino: {{ $usersBySex['F'] }}</h3>
                <p></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <h4 class="text-center">Quantidade de voluntários</h4>
                <h3 class="text-center">{{ $voluntaryUsers }}</h3>
                <p></p>
            </div>
        </div>
    </div>


	<div id="container" class="highcharts">
		
	</div>
	<script>
		var data = [<?= json_encode($totalUsers) ?>]; 

		$(function () {
    // Set up the chart
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        title: {
            text: 'Quantidade total de usuários'
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        series: [{
            data: data
        }]
    });

});
	</script>
@endsection

