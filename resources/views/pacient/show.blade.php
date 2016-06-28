
<div class="data-title">
    <h3> Informações do paciente <i class="fa fa-wheelchair"></i> </h3>
</div>


<div class="row">
    <div clas="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">

                <div style="overflow-x:auto;">

                    <table class="table table-bordered table-hover">
                        <thead class="thead-default">
                            <tr>
                            <th colspan="2"> <center> <h4> Informações do paciente </h4> </center> </th>
                            </tr>
                        </thead>
                        <tr>
                            <td> <center> <img src="/images/profile/{{ $pacient->user->image ?: 'default-profile.png' }}" width="80" height="80"> </center> </td>
                            <td> <h3> {{ $pacient->user->name }} </h3> </td>
                        </tr>
                        <tr>
                            <td> <label class="right"> Status: </label> </td>
                            <td> {{ $pacient->status['name'] }} </td>
                        </tr>
                        <thead class="thead-default">
                            <tr>
                            <th colspan="2"> <center> <h4> Terapias </h4> </center> </th>
                            </tr>
                        </thead>
                            @foreach ($pacient->pacientTherapy as $pacientTherapy)
                                @if(  !is_null($pacientTherapy->therapy) )
                                <tr>
                                    <td colspan="2"> <center> {{ $pacientTherapy->therapy->name }}  </center> </td>
                                </tr>
                                @endif
                            @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>