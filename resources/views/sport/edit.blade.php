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

{!! Form::open(array('method' => 'post', 'action' => array('SportController@update', $sport->id))) !!}
<lablel>Editar esporte:</lablel>
  {!! Form::text('name', $sport->name, $attributes = array('class' => 'form-control')) !!}
    <br>
  {!! Form::submit('Salvar', $attributes = array('class' => 'btn btn-primary')) !!}    
{!! Form::close() !!}