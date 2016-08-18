<div class="data-title">
  <h3>Editando um esporte</h3>
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