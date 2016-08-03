@extends('layouts.layout')

@section('title')
    <i style="color: #08698A">Olá, bem vindo ao MyIntranet!</i>
@stop

@section('content')

<div class="jumbotron">
  
  <h3 style="margin-bottom: 40px">Com MyIntranet, você poderá: </h3>
  
  
  <div class="row">
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
         <h1><div class="text-center"><i class="fa fa-users" style="color: #08698A"></i></div></h1>
        <div class="caption">
          <h3><div class="text-center">Administrar <br> Usuários</div></h3>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
         <h1><div class="text-center"><i class="fa fa-trophy" style="color: #08698A"></i></div></h1>
        <div class="caption">
          <h3><div class="text-center">Administrar <br> Atletas</div></h3>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
         <h1><div class="text-center"><i class="fa fa-star" style="color: #08698A"></i></div></h1>
        <div class="caption">
          <h3><div class="text-center">Administrar <br> Funcionários</div></h3>
        </div>
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
         <h1><div class="text-center"><i class="fa fa-heart" style="color: #08698A"></i></div></h1>
        <div class="caption">
          <h3><div class="text-center">Administrar <br> Voluntários</div></h3>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
         <h1><div class="text-center"><i class="fa fa-wheelchair" style="color: #08698A"></i></div></h1>
        <div class="caption">
          <h3><div class="text-center">Administrar <br> Pacientes</div></h3>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
         <h1><div class="text-center"><i class="fa fa-user" style="color: #08698A"></i></div></h1>
        <div class="caption">
          <h3><div class="text-center">Administrar <br> Acessos</div></h3>
        </div>
      </div>
    </div>  

  </div>

</div>

@stop