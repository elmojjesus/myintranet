    
<div class="data-title">
    <h3> Editando informações do atleta <i class="fa fa-trophy"></i> </h3>
</div>


<div class="row">
    <div clas="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">

                <div style="overflow-x:auto;">
                    
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td> 
                                    <center> <img src="{{ '/images/profile/' . $athlete->user->image }}" width="80" height="80"> </center> 
                                </td>
                                <td> <h3> {{ $athlete->user->name }} </h3> </td>
                            </tr>
                        </thead>

                        <tbody>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        {!! Form::open(array('method' => 'post', 'action' => array('AthleteController@update', $athlete->id), 'name' => 'updateStatus')) !!}
                        

                            <tr>
                                <th colspan="2">
                                    <center> Status do atleta</center>
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select class="form-control" id="status" name="status_id">
                                        @foreach($status as $statu)
                                            <option {{ $statu->id == $athlete->status->id ? 'selected' : '' }} value="{{ $statu->id }}">{{ $statu->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button class="btn btn-primary right" onclick="formSubmit(updateStatus)">Alterar Status</button>  
                                </td>
                            </tr>

                            {!! Form::close() !!}

                            {!! Form::open(array('method' => 'post', 'action' => array('AthleteSportsController@destroy', $athlete->id), 'name' => 'destroyAthleteSports')) !!}
                            

                            <tr>
                                <th colspan="2">
                                    <center> Esportes em atividade </center>
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table class="table table-hover">  
                                            @foreach ($athlete->athleteSport as $key => $athleteSport)
                                                @if(  !is_null($athleteSport->sport) )
                                                <tr>
                                                    <td> 
                                                        <center> 
                                                            {{ $athleteSport->sport->name }}
                                                        </center> 
                                                    </td>
                                                    <td>
                                                        <center>
                                                        {!! Form::checkbox('sports[]', $athleteSport->sport->id, null) !!}
                                                        </center>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>
                                    <button class="btn btn-primary right" onclick="formSubmit(destroyAthleteSports)">Excluir esporte(s)</button>  
                                </td>
                            </tr>

                            {!! Form::close() !!}

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>