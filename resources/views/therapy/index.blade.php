@extends('layouts.layout')

@section('title')
    Controle de terapia <small> / Pacientes / Terapia </small>
@stop

@section('content')
<div class="row">

<div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"> Cadastre uma terapia </div>
                <div class="panel-body">
                        {!! Form::open(array('method' => 'post', 'action' => 'TherapyController@store')) !!}
                            <div class="form-group">
                                <label> Nome da terapia </label>
                                {!! Form::text('name', '', $attributes = array('class' => 'form-control')) !!}
                                <br>
                                {!! Form::submit('Cadastrar terapia', $attributes = array('class' => 'btn btn-primary')) !!}    
                            </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>

 <!-- <div class="col-lg-6">
	<a data-mfp-src="/therapy/create" class="btn btn-primary modal-ajax-link">Adicionar Nova Terapia</a>

</div> -->
 <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"> Terapias já registradas </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <th> Terapia </th>
                                <th>  </th>
                            </tr>
                            @if($therapies->count() > 0)
                                @foreach ($therapies as $therapy)
                                    <tr>
                                        <td> {!! $therapy->name !!} </td>
                                        <td> <a class="modal-ajax-link" data-mfp-src="/therapy/edit/{{ $therapy->id }}"> <i class="fa fa-pencil"></i> </a> </td>
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
       </div>
		
@endsection