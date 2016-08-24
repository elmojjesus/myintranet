@extends('layouts.layout')

@section('title')
    Pacientes 
@stop

@section('main_title')
    <i class="fa fa-wheelchair"></i>
    <small> / Pacientes / Buscar - Listar </small>
@stop

@section('content')

<!-- FILTROS DO ATLETA -->
<div class="row">
    <div clas="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Filtros de busca</div>
            <div class="panel-body">
                <form>
                    <div class="row">
                        <div class="col-sm-4">
                            <div id="dataTables-example_length" class="dataTables_length">
                                
                                <label>ID:</label>
                                <input type="text" name="id" id="id" maxlength="3" value="{{ isset($query['id']) ? $query['id'] : '' }}" class="form-control numeric">

                            </div>
                        </div>
                        

                        <div class="col-sm-4">
                            <div id="dataTables-example_length" class="dataTables_length">
                                
                                <label>Nome:</label>
                                <input type="text" name="name" value="{{ isset($query['name']) ? $query['name'] : '' }}" class="form-control">
                                
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div id="dataTables-example_length" class="dataTables_length">
                                <label>Terapia:</label>
                                <select name="therapy_id" class="form-control input-sm">
                                    <option value="">--Selecione--</option>
                                    @foreach($therapies as $therapy)
                                        <option {{ isset($query['therapy_id']) && $query['therapy_id'] == $therapy->id ? 'selected="selected"' : '' }} value="{{ $therapy->id }}">{{ $therapy->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-6">
                            <div id="dataTables-example_length" class="dataTables_length">
                                <label>Status:</label>
                                <select name="status_id" class="form-control input-sm">
                                    <option value="">--Selecione--</option>
                                    @foreach($status as $s)
                                        <option {{ isset($query['status_id']) && $query['status_id'] == $s->id ? 'selected="selected"' : '' }} value="{{ $s->id }}">{{ $s->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div id="dataTables-example_length" class="dataTables_length">
                                <label>Deficiência:</label>
                                <select name="deficiency_id" class="form-control input-sm">
                                    <option value="">--Selecione--</option>
                                    @foreach($deficiencies as $deficiency)
                                        <option {{ isset($query['deficiency_id']) && $query['deficiency_id'] == $deficiency->id ? 'selected="selected"' : '' }} value="{{ $deficiency->id }}">{{ $deficiency->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div id="dataTables-example_length" class="dataTables_length">
                                <a class="btn btn-default" href="/pacient">Limpar busca</a>
                                <input type="submit" class="btn btn-primary" value="Buscar">
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>


<!-- TABELA DE ATLETAS -->
<div class="row">
    <div clas="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Listagem de pacientes</div>
            <div class="panel-body">

                <div style="overflow-x:auto;">
                    
                    @if($users['items'])
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th> ID               </th>
                            <th> Nome             </th>
                            <th> Qtd de Terapias  </th>
                            <th> Status           </th>
                            <th> Deficiência      </th>
                            <th>                  </th>
                            <th>                  </th>
                        </tr>   

                            @foreach($users as $user) 
                                <tr>
                                    <td> {{ $user->user_id }} </td>                
                                    <td> 
                                        <a class="modal-ajax-link" data-mfp-src="pacient/show/{{ $user->pacient_id }}">
                                            {{ $user->name }}
                                        </a> 
                                    </td>
                                    <td>
                                           {{ $user->therapies }}
                                    </td>
                                    
                                    <td> {{ $user->status_name ? $user->status_name : 'Não cadastrado' }}</td>
                                    <td> {{ $user->deficiency_name ? $user->deficiency_name : 'Não cadastrado' }} </td>
                                    <td> 
                                        <a class="modal-ajax-link" data-mfp-src="/pacient/edit/{{ $user->pacient_id }}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if($user->deleted_at != null or $user->status_id == 2)
                                            <a class="disabled modal-ajax-link" data-mfp-src="/pacient/delete/{{ $user->pacient_id }}">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        @elseif($user->deleted_at == null or $user->status_id != 2)
                                            <a class="modal-ajax-link" data-mfp-src="/pacient/delete/{{ $user->pacient_id }}">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            <tfoot>
                                <tr>
                                    <th> ID               </th>
                                            <th> Nome             </th>
                                            <th> Qtd de Terapias  </th>
                                            <th> Status           </th>
                                            <th> Deficiência      </th>
                                            <th>                  </th>
                                            <th>                  </th>

                                </tr>
                            </tfoot>
                    </table>
                    <div class="row">
                        <div class="col-sm-6">
                            <div aria-relevant="all" aria-live="polite" role="alert" id="dataTables-example_info" class="dataTables_info">
                            Total na página: {!! $users->count() !!}
                            <br>
                            Pacientes no total: {!! $users->total() !!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers">    
                                {!! $users->appends([
                                
                                    'id' => isset($query['id']) ? $query['id'] : '',
                                    'name' => isset($query['name']) ? $query['name'] : '',
                                    'therapy_id' => isset($query['therapy_id']) ? $query['therapy_id'] : '',
                                    'status_id' => isset($query['status_id']) ? $query['status_id'] : '',
                                    'deficiency_id' => isset($query['deficiency_id']) ? $query['deficiency_id'] : ''
                                
                                ])->render() !!}
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="alert alert-danger">Nenhum paciente cadastrado.</div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>

@stop