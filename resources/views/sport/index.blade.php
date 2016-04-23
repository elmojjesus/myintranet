@extends('layouts.layout')

@section('title')
    Controle de esportes <small> / Atletas / Esportes </small>
@stop

@section('content')
    
    <div class="row">
        
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"> Cadastre um esporte </div>
                <div class="panel-body">
                        {!! Form::open(array('method' => 'post', 'action' => 'SportController@store')) !!}
                            <div class="form-group">
                                <label> Nome do esporte </label>
                                {!! Form::text('name', '', $attributes = array('class' => 'form-control')) !!}
                                <br>
                                {!! Form::submit('Cadastrar esporte', $attributes = array('class' => 'btn btn-primary')) !!}    
                            </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"> Esportes já registrados </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <th> Esporte </th>
                                <th>  </th>
                            </tr>
                            @if($sports->count() > 0)
                                @foreach ($sports as $sport)
                                    <tr>
                                        <td> {!! $sport->name !!} </td>
                                        <td> <a class="modal-ajax-link" data-mfp-src="/sport/edit/{{ $sport->id }}"> <i class="fa fa-pencil"></i> </a> </td>
                                    </tr>
                                @endforeach  
                            @else
                                Vazio.  
                            @endif
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <!-- Fim linha -->
    </div>
        
@stop