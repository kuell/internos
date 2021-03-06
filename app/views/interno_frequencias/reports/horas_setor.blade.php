@extends('layout.report')

@section('main')
<div class="col-md-12">
	<h1>Controle de Horas Trabalhadas por Setor</h1>
	<h3>Ref: {{ $periodo[0] }} a {{ $periodo[1] }} </h3>
	<table class="table table-condensed">
					<tr>
						<th>Setor</th>
						<th>Qtde. Colaboradores</th>
						<th>Hora Base do Setor</th>
						<th>Qtd. Dias Trabalhados</th>
						<th>Horas Trabalhadas</th>
						<th>Horas Potenciais</th>
					</tr>

					@foreach ($dados as $val)
						<tr>
							<td>{{ $val->setor }}</td>
							<td>{{ $val->internos }}</td>
							<td>{{ $val->horabase }}</td>
							<td>{{ $val->qtddias }}</td>
							<td>{{ $val->horastrabalhadas }}</td>
							<th>{{ $val->horaspotenciais }} </th>
						</tr>
					@endforeach
					<tr>
						<th>Totais: </th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</table>
</div>

	<div class="well">Nenhum registro retornado</div>

@endsection