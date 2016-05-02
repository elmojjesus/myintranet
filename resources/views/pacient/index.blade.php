@extends('layouts.layout')

@section('title')
    Pacientes
    <small> / Pacientes / Buscar - Listar </small>
@stop

@section('content')


<div class="row">
    <div clas="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Filtros de busca</div>
            <div class="panel-body">
                <form>
                    <div class="row">
                        <div class="col-sm-3">
                            <div id="dataTables-example_length" class="dataTables_length">
                                
                                <label>ID:</label>
                                <input type="text" name="id" value="{{ isset($query['id']) ? $query['id'] : '' }}" class="form-control">

                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div id="dataTables-example_length" class="dataTables_length">
                                
                                <label>CPF:</label>
                                <input type="text" name="id" value="{{ isset($query['id']) ? $query['id'] : '' }}" class="form-control">

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div id="dataTables-example_length" class="dataTables_length">
                                
                                <label>Nome:</label>
                                <input type="text" name="name" value="{{ isset($query['name']) ? $query['name'] : '' }}" class="form-control">
                                
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-4">
                            <div id="dataTables-example_length" class="dataTables_length">
                                <label>Status na reabilitação:</label>
                                <select name="status_id" class="form-control input-sm">
                                    <option value="">Selecione</option>       
                                </select>
                            </div>
                        </div>

                         <div class="col-sm-4">
                            <div id="dataTables-example_length" class="dataTables_length">
                                <label>Terapia:</label>
                                <select name="status_id" class="form-control input-sm">
                                    <option value="">Selecione</option>       
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div id="dataTables-example_length" class="dataTables_length">
                                <label>Deficiência:</label>
                                <select name="deficiency_id" class="form-control input-sm">
                                    <option value="">Selecione</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <br>

                    <div class="row right">
                        <div class="col-lg-12">
                            <div id="dataTables-example_length" class="dataTables_length">
                                <button class="btn btn-default " href="/user">
                                    Limpar busca
                                </button>
                                <button class="btn btn-primary " type="submit">
                                    Buscar &nbsp; <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>


<div class="row">
    <div clas="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Listagem de paciente</div>
            <div class="panel-body">
                    @if($pacients->count() > 0)
                <div style="overflow-x:auto;">

                    <table class="table table-hover">
                        <tr>
                          <th>ID</th>
                <th>Paciente</th>
                <th>Terapia</th>
                <th>Status</th>
                <th>Deficiência</th>
                <th>Ações</th>
                        </tr>   
                            @foreach($pacients as $pacient)            
                                <tr>
                                    <td>{{ $pacient->user->id }}</td>
                                    <td>{{ $pacient->user->name }}</td>
                                    <td>{{ $pacient->status->name }}</td>
                                    <td>status aqui</td>
                                    <td>deficiência aqui</td>
                                    <td>
                                        <a class="modal-ajax-link" data-mfp-src="/pacient/edit/{{ $pacient->id }}"><i class="fa fa-pencil"></i></a>
                                        <a class="modal-ajax-link" data-mfp-src="/pacient/delete/{{ $pacient->id }}"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        
                    </table>
                    <div class="row">
                        <div class="col-sm-6">
                            <div aria-relevant="all" aria-live="polite" role="alert" id="dataTables-example_info" class="dataTables_info">
                            Total na página: {!! $pacient->count() !!}
                            <br>
                            Pacientes no total: 
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers">    
                                
                            </div>
                        </div>
                    </div>

                </div>
    @else
        <div class="alert alert-danger">Nenhum paciente cadastrado</div>
    @endif
            </div>
        </div>
    </div>
</div>

	<p></p>
	<!--<a class="btn btn-primary" href="/pacient/create">Tornar paciente</a>-->		
	<p></p>
	

@endsection