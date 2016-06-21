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
  <h3>Editar esporte: {{ $deficiency->name }}</h3>
</div>
 <div id="erros" class="col-md-12 hidden">
        <div class="form-group">
        <label style="color:#ff0000; text-align: center;">Campo Nome é obrigatório, por favor verifique!</label>
        </div>
    </div> 
{!! Form::open(array('method' => 'post', 'action' => array('SportController@update', $sport->id), 'name' => 'updateSportForm' )) !!}

  <div class="row">
    <div class="col-lg-12">

      Esporte:
      {!! Form::text('name', $sport->name, $attributes = array('class' => 'form-control', 'id' => 'name')) !!}

    </div>
  </div>
  
  <div class="data-footer">
    <button class="btn btn-primary" onclick="return validaCampo();"> Salvar </button>
  </div>  

{!! Form::close() !!}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.43/jquery.form-validator.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js" type="text/javascript"></script>

    <script type="text/javascript">
        
        function validaCampo() {

       $('#name').removeClass('danger');
       $('#erros').addClass('hidden');

        var Nome = $('#name').val();
        if (Nome == null || Nome == "" || Nome == " ") 
        {
       $('#name').addClass('danger');
       $('#erros').removeClass('hidden');
return false;
        }else
        {
            formSubmit(updateSportForm);
            return true;
        }
    }


    </script>