@extends('layouts.layout')

@section('title')
	<a class="btn btn-primary" href="http://google.com" type="button"> 
		<font class="myMiddle"> teste </font>
	</a>
	Informações gerais 
@stop

@section('content')
<div class="row">
	<div clas="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Dados do usuário</div>
			<div class="panel-body">

				<div style="overflow-x:auto;">
					
					<table class="table table-bordered table-hover">
						<thead class="thead-default">
							<tr>
							<th colspan="2"> <center> <h4> Informações gerais </h4> </center> </th>
							</tr>
						</thead>
						<!-- Dados gerais -->
						<tr>
							<td> <center> <img src="#"> </center> </td>
							<td> <h3> {{ $user->name }} </h3> </td>
						</tr>
						<tr>
							<td> Id: {{ $user->id }} </td>
							<td> Nacionalidade: {{ $user->nacionality }} </td>
						</tr>
						<tr>
							<td> E-mail: {{ $user->email }} </td>
							<td> Mãe: {{ $user->mother }} </td>
						</tr>
						<tr>
							<td> Deficiência: {{ $user->deficiency->name }} </td>
							<td> Pai: {{ $user->father }} </td>
						</tr>
						<tr>
							<td> Data Nasc.: {{ $user->birthDate }} </td>
							<td> Escolaridade: {{ $user->education->name }} </td>
						</tr>
						<tr>
							<td> Sexo: {{ $user->sex }} </td>
							<td> Profissão: {{ $user->profession->name }} </td>
						</tr>
					</table>

						<!-- Documentos -->
						<table class="table table-bordered table-hover">
							<thead class="thead-default">
								<tr>
										<th colspan="2"> <center> <h4> Documentos </h4> </center> </th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td> CPF: {{ $user->document->cpf }} </td>
									<td> RG: {{ $user->document->rg }} </td>
								</tr>
								<tr>
									<td colspan="2"> Passaporte: {{ $user->document->passaport }} </td>
								</tr>
							</tbody>
						</table>

						<!-- Endereço -->
						<table class="table table-bordered table-hover">
							<thead class="thead-default">
								<tr>
									<th colspan="2"> <center> <h4> Endereço </h4> </center> </th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td> Cidade: {{ $user->address->city->name }} </td>
									<td> Estado: -ver- </td>
								</tr>
								<tr>
									<td> Rua: {{ $user->address->street }} </td>
									<td> Numero: {{ $user->address->number }} </td>
								</tr>
								<tr>
									<td> Complemento: {{ $user->address->complement}} </td>
									<td> CEP: {{ $user->address->zip_code }} </td>
								</tr>
								<tr>
									<td> Bairro: {{ $user->address->neighborhood }} </td>
									<td> Regional? {{ $user->address->regional }} </td>
								</tr>
							</tbody>
						</table>

						<!-- Contato -->
						@if(!is_null($user->contact))
							<table class="table table-bordered table-hover">
								<thead class="thead-default">
									<tr>
										<th colspan="2"> <center> <h4> Contatos </h4> </center> </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td> Telefone: {{ $user->contact->homeNumber }} </td>
										<td> Celular: {{ $user->contact->mobileNumber }} </td>
									</tr>
									<tr>
										<td colspan="2"> Num. para recado: {{ $user->contact->toMessageNumber }} </td>
									</tr>
									<tr>
										<td colspan="2"> Email: {{ $user->contact->email }} </td>
									</tr>
								</tbody>
							</table>
						@endif

						<!-- Atendimentos -->
						<table class="table table-bordered table-hover">
							<thead class="thead-default">
								<tr>
									<td colspan="5"> <center> <h4> Atendimentos </h4> </center> </td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th> Esporte </th>
									<th> RH </th>
									<th> Reabilitação </th>
									<th> Associação </th>
									<th> Voluntariádo </th>
								</tr>
								<tr>
									<td>
										<center>
											@if(!is_null($user->athlete))
												<i class="fa fa-check" style="color: green"></i>
											@else
												<i class="fa fa-times" style="color: red"></i>
											@endif
										</center>
									</td>
									<td> --- </td>
									<td> --- </td>
									<td> --- </td>
									<td> --- </td>
								</tr>
							</tbody>
						</table>

				</div>

			</div>
		</div>
	</div>
</div>
@stop