@extends('layouts.layout')
@section('content')
	<script src="{{ URL::asset('assets/js/jquery-1.10.2.js') }}"></script>
	<script src="{{ URL::asset('assets/js/highcharts/highcharts.js') }}"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

	
	<h2>Relatórios de Pacientes</h2>
	<p></p>
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="panel panel-default">
                <h4 class="text-center">Quantidade total de pacientes</h4>
                <h3 class="text-center">{{ $totalPacients }}</h3>
                <p></p>
            </div>    
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <h4 class="text-center">Quantidade por sexo</h4>
                <h3 class="text-center">Masculino: {{ $pacientsBySex['M'] }}</h3>
                <h3 class="text-center">Feminino: {{ $pacientsBySex['F'] }}</h3>
                <p></p>
            </div>
        </div>
        <div class="col-md-6">
        	<div id="pacients-terapies"></div>
        </div>
        <div class="col-md-6">
        	<div id="pacients-status"></div>
        </div>
    </div>

    <script>
    	var data = <?= json_encode($pacientsByTerapies) ?>;
        var amount = '<?= $amountPacientsTerapies ?>';
		$(function () {
		    var chart = new Highcharts.Chart({
		        chart: {
		            renderTo: 'pacients-terapies',
		            type: 'pie',
		        },
		        title: {
		            text: 'Quantidade de pacientes por terapia - Total: ' + amount
		        },
		        plotOptions: {
		            pie: {
		                allowPointSelect: true,
		                cursor: 'pointer',
		                dataLabels: {
		                    enabled: true,
		                    format: '<b>{point.name}</b>: {point.y:.0f}',
		                    style: {
		                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
		                    },
		                    connectorColor: 'silver',
		                    showInLegend: true
		                }
		            }
		        },
		        series: [{
		            data: data
		        }]
		    });
		});
		var data = <?= json_encode($pacientsByStatus) ?>;
        var amount = '<?= $amountPacientsStatus ?>';
		$(function () {
		    var chart = new Highcharts.Chart({
		        chart: {
		            renderTo: 'pacients-status',
		            type: 'pie',
		        },
		        title: {
		            text: 'Quantidade de pacientes por terapia - Total: ' + amount
		        },
		        plotOptions: {
		            pie: {
		                allowPointSelect: true,
		                cursor: 'pointer',
		                dataLabels: {
		                    enabled: true,
		                    format: '<b>{point.name}</b>: {point.y:.0f}',
		                    style: {
		                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
		                    },
		                    connectorColor: 'silver',
		                    showInLegend: true
		                }
		            }
		        },
		        series: [{
		            data: data
		        }]
		    });
		});
    </script>
@endsection