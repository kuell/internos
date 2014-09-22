@extends('layout.report')

@section('main')
<div class="col-md-12">
	<h1>Controle de Horas Trabalhadas por Interno</h1>

	Nome: {{ $interno->nome }}<br />
	Setor: {{ $interno->setor->descricao or 'Não Informado' }}<br />
	Parametro de Horas Potênciais: {{ $interno->setor->padrao_horatrabalho or '00:00:00' }}<br />

<?php
$totalHora = "00:00:00";

?>
<table class="table table-bordered">
		<tr>
			<td>
				<table class="table table-condensed">
					<tr>
						<th>Data</th>
						<th>Entrada</th>
						<th>Saida</th>
						<th>Horas Trabalhadas</th>
						<th>Hora Extra</th>
					</tr>
					@for ($i = 1; $i < (cal_days_in_month(CAL_GREGORIAN, $data[0], $data[1])-14);$i++)
						<tr>
						@if(date('N', strtotime($data[1].'-'.$data[0].'-'.$i)) == 7)
							<tr class="danger">
								<td>{{ date('d/m/Y', strtotime($data[1].'-'.$data[0].'-'.$i)) }}</td>
								<td>Domingo</td>
								<td>Domingo</td>
								<td>Domingo</td>
								<td>00:00</td>
							</tr>
						@else
							<tr>
								<td>{{ date('d/m/Y', strtotime($data[1].'-'.$data[0].'-'.$i)) }}</td>
								<td>{{ $dados[$data[1].'-'.$data[0].'-'.str_pad($i, 2, "0", STR_PAD_LEFT)]['entrada'] or '' }}</td>
								<td>{{ $dados[$data[1].'-'.$data[0].'-'.str_pad($i, 2, "0", STR_PAD_LEFT)]['saida'] or '' }}</td>
								<td>{{ $dados[$data[1].'-'.$data[0].'-'.str_pad($i, 2, "0", STR_PAD_LEFT)]['horasTrabalhadas'] or '' }}</td>
								@if(!empty($dados[$data[1].'-'.$data[0].'-'.str_pad($i, 2, "0", STR_PAD_LEFT)]))
								<td>{{ InternoFrequencia::calcHoraExtra($dados[$data[1].'-'.$data[0].'-'.str_pad($i, 2, "0", STR_PAD_LEFT)]['horasTrabalhadas'], $interno->setor->padrao_horatrabalho) }}</td>

<?php $totalHora = InternoFrequencia::somaHora($totalHora, InternoFrequencia::calcHoraExtra($dados[$data[1].'-'.$data[0].'-'.str_pad($i, 2, "0", STR_PAD_LEFT)]['horasTrabalhadas'], $interno->setor->padrao_horatrabalho))?>
@else
								<td></td>
							@endif
							</tr>
						@endif
					@endfor
				</table>
			</td>
			<td>
				<table class="table table-condensed">
					<tr>
						<th>Data</th>
						<th>Entrada</th>
						<th>Saida</th>
						<th>Horas Trabalhadas</th>
						<th>Hora Extra</th>
					</tr>
					@for ($i = 17; $i < (cal_days_in_month(CAL_GREGORIAN, $data[0], $data[1]));$i++)
						@if(date('N', strtotime($data[1].'-'.$data[0].'-'.$i)) == 7)
						<tr class="danger">
							<td>{{ date('d/m/Y', strtotime($data[1].'-'.$data[0].'-'.$i)) }}</td>
							<td>Domingo</td>
							<td>Domingo</td>
							<td>Domingo</td>
							<td>00:00:00</td>
						</tr>
						@else
						<tr>

							<td>{{ date('d/m/Y', strtotime($data[1].'-'.$data[0].'-'.$i)) }}</td>
							<td>{{ $dados[$data[1].'-'.$data[0].'-'.$i]['entrada'] or '' }}</td>
							<td>{{ $dados[$data[1].'-'.$data[0].'-'.$i]['saida'] or '' }}</td>
							<td>{{ $dados[$data[1].'-'.$data[0].'-'.$i]['horasTrabalhadas'] or '' }}</td>
							@if(!empty($dados[$data[1].'-'.$data[0].'-'.str_pad($i, 2, "0", STR_PAD_LEFT)]))
								<td>{{ InternoFrequencia::calcHoraExtra($dados[$data[1].'-'.$data[0].'-'.str_pad($i, 2, "0", STR_PAD_LEFT)]['horasTrabalhadas'], $interno->setor->padrao_horatrabalho) }}</td>

<?php $totalHora = InternoFrequencia::somaHora($totalHora, InternoFrequencia::calcHoraExtra($dados[$data[1].'-'.$data[0].'-'.str_pad($i, 2, "0", STR_PAD_LEFT)]['horasTrabalhadas'], $interno->setor->padrao_horatrabalho))?>
							@else
								<td></td>
							@endif
							<tr>
						@endif
					@endfor
				</table>
			</td>
		</tr>
	</table>

		<div class="well">
			Total de Hora Extra: {{ $totalHora }}
		</div>

</div>

@endsection