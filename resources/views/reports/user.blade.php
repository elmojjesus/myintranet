@extends('layouts.layout')
@section('content')
	<script src="{{ URL::asset('assets/js/jquery-1.10.2.js') }}"></script>
	<script src="{{ URL::asset('assets/js/highcharts/highcharts.js') }}"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

	
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
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div id="regionais"></div>
    </div>
    <div class="col-md-6">
        <div id="deficiencies"></div>
    </div>
    <div class="clearfix"></div>
    <p></p>
    <div class="col-md-6">
       <div id="status-users"></div>
    </div>
    <div class="col-md-6">
       <div id="professions"></div>
    </div>
		
	</div>
	<script>
		var data = <?= json_encode($usersByStatus) ?>;
        var amount = '<?= $amountUsersStatus ?>';
		$(function () {
    // Set up the chart
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'status-users',
            type: 'pie',
        },
        title: {
            text: 'Quantidade de usuários por status - Total: ' + amount
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

    var regionais = <?= json_encode($usersByRegional); ?>;
    var amountRegional = '<?= $amountUsersRegional ?>';

    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'regionais',
            type: 'pie',
        },
        title: {
            text: 'Quantidade de usuários por regional - Total: ' + amountRegional
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
            data: regionais
        }]
    });

    var deficiencies = <?= json_encode($usersByDeficiency); ?>;
    var amountUsersDeficiency = '<?= $amountUsersDeficiency ?>';

    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'deficiencies',
            type: 'pie',
        },
        title: {
            text: 'Quantidade de usuários por deficiência - Total: ' + amountUsersDeficiency
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
            data: deficiencies
        }]
    });


    var professions = <?= json_encode($usersByProfession); ?>;
    var amountUsersProfession = '<?= $amountUsersProfession ?>';

    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'professions',
            type: 'pie',
        },
        title: {
            text: 'Quantidade de usuários por profissão - Total: ' + amountUsersProfession
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
            data: professions
        }]
    });

});
	</script>
@endsection

