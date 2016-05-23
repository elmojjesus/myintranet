    
<div class="data-title">
    <h3> Editando informações do atleta <i class="fa fa-trophy"></i> </h3>
</div>


<div class="row">
    <div clas="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">

                <div style="overflow-x:auto;">

                    {!! Form::open(array('method' => 'post', 'action' => array('AthleteController@update', $athlete->id), 'name' => 'editAthlete')) !!}
                    
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td> <center> <img src="{{ '/images/profile/' . $athlete->user->image }}" width="80" height="80"> </center> </td>
                                <td> <h3> {{ $athlete->user->name }} </h3> </td>
                            </tr>
                        </thead>

                        <tbody>
                            <table class="table table-hover">
                                <thead class="thead-default">
                                    <tr>
                                        <th> <center> Status do atleta    </center> </th>
                                        <th> <center> Esportes praticados </center> </th>
                                    </tr>
                                </thead>
                                <tbody id="myForm">
                                <tr>
                                    <td>
                                        <p class="text-center"> {{ $athlete->status->name }} </p>
                                    </td>
                                    <td>      
                                        <table class="table table-hover">  
                                            @foreach ($athlete->athleteSport as $key => $athleteSport)
                                                @if(  !is_null($athleteSport->sport) )
                                                <tr>
                                                    <td> 
                                                        <center> 
                                                            {{ $athleteSport->sport->name }}
                                                            <input type="hidden" value="{{ $athleteSport->sport->id }}" id="sport_id{{ $key }}" name="sport_id">
                                                        </center> 
                                                    </td>
                                                    <td>
                                                        <a 
                                                          href="/athleteSports/destroy/{{ $athlete->id }}/{{ $athleteSport->sport->id }}" 
                                                          class="pointer" 
                                                          data-toggle="tooltip" 
                                                          data-placement="top" 
                                                          title="Remover esporte">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </tbody>
                    </table>
                    
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

<div class="data-footer"> 
    <button class="btn btn-primary" onclick="formSubmit(editAthlete)">Salvar alterações</button>  
</div>