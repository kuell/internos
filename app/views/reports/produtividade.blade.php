@extends('layout.report')

@section('main')
<div class="col-md-12">
	<h1>Relatorio de Produtividade</h1>
	<h3>Ref:  </h3>
@if ($dados)
	<table class="table table-condensed">
					<tr>
						<th>Setor</th>
						<th>Qtde. Horas Trabalhadas</th>
					</tr>

					@foreach ($dados as $val)
						<tr>
							<td>{{ $val->setor }}</td>
							<td>{{ $val->horastrabalhadas or '00:00:00' }}</td>
						</tr>
					@endforeach
				</table>
</div>
@else
	<div class="well">Nenhum registro retornado</div>
@endif


@endsection