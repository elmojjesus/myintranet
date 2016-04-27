@extends('layouts.layout')

@section('title')
    Cadastre um atleta <i class="fa fa-trophy"></i>
    <small> / Atletas / Cadastrar </small>
@stop

@section('content')
<div class="row">
    <div clas="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Buscar Usuários</div>
            <div class="panel-body">
                
                {!! Form::open(array('method' => 'post', 'action' => array('AthleteController@create'))) !!}

                <div class="row">
                    
                    <div class="col-sm-6">
                        <div id="dataTables-example_length" class="dataTables_length">

                            Id: {!! Form::text('id', '', $attributes = array('class' => 'form-control')) !!}

                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div id="dataTables-example_length" class="dataTables_length">

                            Nome: {!! Form::text('name', '', $attributes = array('class' => 'form-control')) !!}

                        </div>
                    </div>
                
                </div>

                <br>

                <div class="row">

                    <div class="col-lg-12">
                        <div id="dataTables-example_length" class="dataTables_length">
                        
                            {!!Form::submit('Buscar', $attributes = array('class' => 'btn btn-primary')) !!}

                        </div>
                    </div>
                            
                </div>

                {!! Form::close() !!}
              
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div clas="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Usuários Comuns</div>
            <div class="panel-body">
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Nome </th>
                            <th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td> {{ $user->id }} </td>
                                <td> {{ $user->name }} </td> 
                                <td>
                                    <a class="modal-ajax-link" data-mfp-src="create/modal/{{ $user->id }}"> 
                                        Torná-lo(a) atleta  <i class="fa fa-trophy"></i>
                                    </a>   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th> ID </th>
                            <th> Nome </th>
                            <th>
                        </tr>
                    </tfoot>
                </table>

                <div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers">
                    {!! $users->render() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@stop