@extends('layouts.layout')

@section('title')
    Funcionários
    <small> / Funcionários / Buscar - Listar </small>
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
                        <div class="col-sm-6">
                            <div id="dataTables-example_length" class="dataTables_length">
                                <label>Departamento:</label>
                                <select name="status_id" class="form-control input-sm">
                                    <option value="">Selecione</option>       
                                </select>
                            </div>
                        </div>

                         <div class="col-sm-6">
                            <div id="dataTables-example_length" class="dataTables_length">
                                <label>Status:</label>
                                <select name="status_id" class="form-control input-sm">
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

<!-- TABELA DE FUNCIONARIOS -->
<div class="row">
    <div clas="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Listagem de funcionários</div>
            <div class="panel-body">
@if($employees)
                <div style="overflow-x:auto;">
                    
                    <table class="table table-hover">
                        <tr>
                            <th> ID               </th>
                            <th> Nome             </th>
                            <th> Departamento  </th>
                            <th> Status     </th>
                             <th>                  </th>
                            <th>                  </th>
                        </tr>   
                            @foreach($employees as $employee)            
                                <tr>
                                    <td> {{ $employee->id }} </td>                
                                    <td> 
                                        <a class="modal-ajax-link" data-mfp-src="">
                                            {{ $employee->user->name  }}
                                        </a> 
                                    </td>
                                    <td> {{ $employee->departament->name }} </td>
                                     <td> {{ $employee->user->status  }} </td>
                                    <td> 
                                        <a class="modal-ajax-link" data-mfp-src="">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="modal-ajax-link" data-mfp-src="">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        
                    </table>
                    <div class="row">
                        <div class="col-sm-6">
                            <div aria-relevant="all" aria-live="polite" role="alert" id="dataTables-example_info" class="dataTables_info">
                            Total na página: {!! $employee->count() !!}
                            <br>
                            Funcionários no total: 
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers">    
                                
                            </div>
                        </div>
                    </div>

                </div>
	@else
		<div class="alert alert-danger">Nenhum funcionário</div>
	@endif
            </div>
        </div>
    </div>
</div>
		<!--<a class="btn btn-primary pull-right modal-ajax-link" data-mfp-src="/employee/create">Tornar Funcionário</a>-->

@endsection