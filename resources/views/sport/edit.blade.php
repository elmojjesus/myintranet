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

  <div class="modal-header">
    <h3>Editar esporte</h3>
  </div>

  <div class="modal-body">
    {!! Form::open(array('method' => 'put',  'action' => array('SportController@update', $sport->id) )) !!}
      Esporte: {!! Form::text('name', $sport->name, $attributes = array('class' => 'form-control')) !!}
  </div>
  <div class="modal-footer">
      {!! Form::submit('Editar', $attributes = array('class' => 'btn btn-primary')) !!}   
  </div>
    {!! Form::close() !!}