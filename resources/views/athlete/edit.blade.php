    
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
                                        <th> <center> Esporte           </center> </th>
                                        <th> <center> Status no esporte </center> </th>
                                        <th>                                      </th>
                                        <th>                                      </th>
                                    </tr>
                                </thead>
                                <tbody id="myForm">
                                    @foreach ($athlete->athleteSport as $key => $athleteSport)
                                        @if(  !is_null($athleteSport->sport) )
                                        <tr>
                                            <td> 
                                                <center> 
                                                    {{ $athleteSport->sport->name }}
                                                    <input type="hidden" value="{{ $athleteSport->sport->id }}" id="sport_id{{ $key }}" name="sport_id" disabled>
                                                </center> 
                                            </td>
                                            <td>
                                                <select id="status_id{{ $key }}" name="status_id" class="form-control input-sm" disabled>
                                                    @foreach($status as $s)
                                                        <option {{ isset($athleteSport->status->id) && $athleteSport->status->id == $s->id ? 'selected="selected"' : '' }} value="{{ $s->id }}">{{ $s->name }}
                                                        </option>
                                                    @endforeach
                                                </select> 
                                            </td>
                                            <td> 
                                                <a onclick="enableInput(status_id{{ $key }}, sport_id{{ $key }})" data-toggle="tooltip" data-placement="top" title="Editar status">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/athleteSports/destroy/{{ $athleteSport->athlete->id }}/{{ $athleteSport->sport->id }}" data-toggle="tooltip" data-placement="top" title="Excluir esporte">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
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
    <button class="btn btn-primary" onclick="formSubmit(editAthlete)">Cadastrar atleta</button>  
</div>