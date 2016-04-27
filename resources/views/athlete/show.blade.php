
<div class="data-title">
    <h3> Informações do atleta <i class="fa fa-trophy"></i> </h3>
</div>


<div class="row">
    <div clas="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">

                <div style="overflow-x:auto;">

                    <table class="table table-bordered table-hover">
                        <thead class="thead-default">
                            <tr>
                            <th colspan="2"> <center> <h4> Informações do atleta </h4> </center> </th>
                            </tr>
                        </thead>
                        <tr>
                            <td> <center> <img src="{{ '/images/profile/' . $athlete->user->image }}" width="80" height="80"> </center> </td>
                            <td> <h3> {{ $athlete->user->name }} </h3> </td>
                        </tr>
                        <thead class="thead-default">
                            <tr>
                            <th> <center> <h4> Esportes que pratica </h4> </center> </th>
                            <th> <center> <h4> Status no esporte    </h4> </center> </th>
                            </tr>
                        </thead>
                            @foreach ($athlete->athleteSport as $athleteSport)
                                @if(  !is_null($athleteSport->sport) )
                                <tr>
                                    <td> <center> {{ $athleteSport->sport->name }}  </center> </td>
                                    <td> <center> {{ $athleteSport->status->name }} </center> </td>
                                </tr>
                                @endif
                            @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>