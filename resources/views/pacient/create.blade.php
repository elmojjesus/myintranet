@extends('layouts.layout')

@section('title')
    Cadastre um paciente <i class="fa fa-wheelchair"></i>
    <small> / Pacientes / Cadastrar </small>
@stop

@section('content')
	<form method="POST" action="/pacient/store">
		{{ csrf_field() }}
<div class="row">
	<div clas="col-md-12">
<div class="panel panel-default">
            <div class="panel-heading">Buscar Usuários</div>
            <div class="panel-body">

		<div class="col-md-4">
			<div class="form-group">
				<label>Usuário</label>
				<select name="user_id" class="form-control">
					<option>Selecione</option>
					@foreach ($users as $user)
						<option value="{{ $user->id }}">{{ $user->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Status</label>
				<select name="status_id" class="form-control">
					<option>Selecione</option>
					@foreach ($status as $s)
						<option value="{{ $s->id }}">{{ $s->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Tarapia</label>
				<select name="therapy_id" class="form-control">
					<option>Selecione</option>
					
				</select>
			</div>
		</div>

	</div>
		</div>

	</div>
	<input class="btn btn-primary" value="Pesquisar" type="submit"/>
</div>
		
	</form>
<br/>
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
                            <th> Deficiência </th>
                            <th> 
                        </tr>
                    </thead>
                    <tbody>
                        
                            <tr>
                                <td> id do usuário </td>
                                <td> nome dele </td> 
                                <td> deficiência do paciente </td> 
                                <td>
                                    <a class="modal-ajax-link" data-mfp-src=""> 
                                        Torná-lo(a) paciente  <i class="fa fa-wheelchair"></i>
                                    </a>   
                                </td>
                            </tr>
                    </tbody>
                 
                </table>

                <div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers">
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection