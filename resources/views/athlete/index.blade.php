@extends('layouts.layout')

@section('title')
    Atletas da ADFP
    <small> / Atletas / Buscar - Listar </small>
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
                                <label>Esporte:</label>
                                <select name="sport_id" class="form-control input-sm">
                                    <option value="">Selecione o esporte</option>
                                    @foreach($sports as $sport)
                                        <option {{ isset($query['sport_id']) && $query['sport_id'] == $sport->id ? 'selected="selected"' : '' }} value="{{ $sport->id }}">{{ $sport->name }}</option>
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
                                    <option value="">Selecione o status no esporte</option>
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
                                    <option value="">Selecione uma deficiência</option>
                                    @foreach($deficiencies as $deficiency)
                                        <option {{ isset($query['deficiency_id']) && $query['deficiency_id'] == $deficiency->id ? 'selected="selected"' : '' }} value="{{ $deficiency->id }}">{{ $deficiency->name }}
                                        </option>
                                    @endforeach
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


<!-- TABELA DE ATLETAS -->
<div class="row">
    <div clas="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Listagem de atletas</div>
            <div class="panel-body">

                <div style="overflow-x:auto;">
                    
                    <table class="table table-hover">
                        <tr>
                            <th> ID               </th>
                            <th> Nome             </th>
                            <th> Qtd de Esportes  </th>
                            <th> Status           </th>
                            <th> Deficiência      </th>
                            <th>                  </th>
                            <th>                  </th>
                        </tr>   
                            @foreach($users as $user)            
                                <tr>
                                    <td> {{ $user->id }} </td>                
                                    <td> 
                                        <a class="modal-ajax-link" data-mfp-src="athlete/show/{{ $user->athlete->id }}">
                                            {{ $user->name }}
                                        </a> 
                                    </td>
                                    <td>
                                        @if(!is_null($user->athlete))
                                            @if(!is_null($user->athlete->athleteSport))
                                                @foreach ($user->athlete->athleteSport as $index => $athleteSport)
                                                    
                                                @endforeach
                                            @endif
                                        @endif
                                        {{ $index+1 }}
                                    </td>
                                    <?php $athlete = $user->athlete; ?>
                                    <td> {{ $athlete->status['name'] }}</td>
                                    <td> {{ $user->deficiency->name }} </td>
                                    <td> 
                                        <a class="modal-ajax-link" data-mfp-src="/athlete/edit/{{ $user->athlete->id }}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="modal-ajax-link" data-mfp-src="/athlete/delete/{{ $user->athlete->id }}">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        
                    </table>
                    <div class="row">
                        <div class="col-sm-6">
                            <div aria-relevant="all" aria-live="polite" role="alert" id="dataTables-example_info" class="dataTables_info">
                            Total na página: {!! $users->count() !!}
                            <br>
                            Atletas no total: {!! $users->total() !!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers">    
                                {!! $users->render() !!}
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.43/jquery.form-validator.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js" type="text/javascript"></script>

<script type="text/javascript">
    
    jQuery('.numeric').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});


</script>

@stop