@extends('layouts.layout')

@section('title')
	<a class="btn btn-primary" href="/user" type="button"> 
		<font class="myMiddle"> <i class="fa fa-arrow-left"></i>
 </font>
	</a>
	Informações gerais 
	<br>
	<small class="left-spacing">  / Usuários / Buscar - Listar / Informações gerais </small>
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
							<td> <center> <img src="/images/profile/{{ $user->image ?: 'default-profile.png' }}" width="80" height="80"> </center> </td>
							<td> <h3> {{ $user->name }} </h3> </td>
						</tr>
						<tr>
							<td> Id: {{ $user->id }} </td>
							<td> Nacionalidade: {{ $user->nationality }} </td>
						</tr>
						<tr>
							<td> Mãe: {{ $user->mother }} </td>
							<td> Pai: {{ $user->father }} </td>
						</tr>
						<tr>
							<td> Deficiência: {{ $user->deficiency ? $user->deficiency->name : 'Sem deficiência' }} </td>
							<td> Profissão: {{ $user->profession ? $user->profession->name : '' }} </td>
							
						</tr>
						<tr>
							<td> Data Nasc.: {{ $user->birthDate }} </td>
							<td> Escolaridade: {{ $user->education->name }} </td>
						</tr>
						<tr>
							<td> Sexo: {{ $user->sex }} </td>
							<td> Porta de Entrada: </td>
						</tr>
						<tr>
							<td> Cadastro Inicial: </td>
							
						</tr>
					</table>

						<!-- Documentos -->
						@if(!is_null($user->document))
							<table class="table table-bordered table-hover">
								<thead class="thead-default">
									<tr>
											<th colspan="2"> <center> <h4> Documentos </h4> </center> </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td> CPF: {{ $user->document->cpf }} </td>
										<?php if($user->document->emission_cpf != '0000-00-00'): ?>
											<?php $date_cpf = \Datetime::createFromFormat('Y-m-d', $user->document->emission_cpf); ?>
										<?php else: ?>
											<?php $date_cpf = false; ?>
										<?php endif; ?>
										<td> Emitido em: {{ $date_cpf ? $date_cpf->format('d/m/Y') : '-' }}</td>
									</tr>
									<tr>
										<td> RG: {{ $user->document->rg }} </td>
										<?php if($user->document->emission_rg != '0000-00-00'): ?>
											<?php $date_rg = \Datetime::createFromFormat('Y-m-d', $user->document->emission_rg); ?>
										<?php else: ?>
											<?php $date_rg = false; ?>
										<?php endif; ?>
										<td> Emitido em: {{ $date_rg ? $date_rg->format('d/m/Y') : '-' }}</td>
									</tr>
									<tr>
										<td> Passaporte: {{ $user->document->passaport }} </td>
										<?php if($user->document->emission_passport != '0000-00-00'): ?>
											<?php $date_passport = \Datetime::createFromFormat('Y-m-d', $user->document->emission_passport); ?>
										<?php else: ?>
											<?php $date_passport = false; ?>
										<?php endif; ?>
										<td> Emitido em: {{ $date_passport ? $date_passport->format('d/m/Y') : '-' }}</td>
									</tr>
								</tbody>
							</table>
						@endif

						<!-- Endereço -->
						@if(!is_null($user->address))
							<table class="table table-bordered table-hover">
								<thead class="thead-default">
									<tr>
										<th colspan="2"> <center> <h4> Endereço </h4> </center> </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td> Cidade: {{ $user->address->city }} </td>
										<td> Estado: {{ $user->address->state }} </td>
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
										<td> Regional: {{ $user->address->regional }} </td>
									</tr>
								</tbody>
							</table>
						@endif

						<!-- Contato -->
					
							<table class="table table-bordered table-hover">
								<thead class="thead-default">
									<tr>
										<th colspan="2"> <center> <h4> Contatos </h4> </center> </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td> Telefone: {{ $user->telephone1 }} </td>
										<td> Celular: {{ $user->telephone2 }} </td>
									</tr>
									<tr>
																	<td> E-mail: {{ $user->email }} </td>
									</tr>
									
								</tbody>
							</table>
						

						<!-- Atendimentos -->
						<table class="table table-bordered table-hover on-center">
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
										@if(!is_null($user->athlete))
											<i class="fa fa-check" style="color: green"></i>
										@else
											<i class="fa fa-times" style="color: red"></i>
										@endif
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