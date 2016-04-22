<!--
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">Alterar esporte</h4>
</div>
<div class="modal-body">
  <p>Será carregado o input ja com placeholder do esporte selecionado</p>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
-->

<!--
    <form method="POST" action="/sport/update/{{ $sport->id }}">
      {{ csrf_field() }}
      Esporte:
      <input type="text" name="name" value="{{ $sport->name }}">
      <br>
      <input type="submit" class="btn btn-primary" value="Salvar">
    </form>
-->

<div class="data-title">
    <h3> Editando um esporte <i class="fa fa-trophy"></i> </h3>
</div>

{!! Form::open(array('method' => 'post', 'action' => array('SportController@update', $sport->id), 'name' => 'updateSportForm' )) !!}

  <div class="row">
    <div class="col-lg-12">

      Esporte:
      {!! Form::text('name', $sport->name, $attributes = array('class' => 'form-control')) !!}

    </div>
  </div>
  
  <div class="data-footer">
    <button class="btn btn-primary" onclick="formSubmit(updateSportForm)"> Salvar </button>
  </div>  

{!! Form::close() !!}