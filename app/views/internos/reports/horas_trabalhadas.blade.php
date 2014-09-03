@extends('layout.report')

@section('main')
<div class="col-md-12">
	<h1>Controle de Horas Trabalhadas por Interno</h1>

	Nome: {{ $interno->nome }}<br />
	Setor: {{ $interno->setor->descricao }}<br />
	Padrão de Horas Trabalhadas: {{ $interno->setor->padrao_horatrabalho }}<br />

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
							<td>{{ date('d/m/Y', strtotime($data[1].'-'.$data[0].'-'.$i)) }}</td>
							<td>Domingo</td>
							<td>Domingo</td>
							<td>Domingo</td>
							<td>00:00:00</td>
						@else
							<td>{{ date('d/m/Y', strtotime($data[1].'-'.$data[0].'-'.$i)) }}</td>
							<td>{{ $dados[$data[1].'-'.$data[0].'-'.$i]['entrada'] or '' }}</td>
							<td>{{ $dados[$data[1].'-'.$data[0].'-'.$i]['saida'] or '' }}</td>
							<td>{{ $dados[$data[1].'-'.$data[0].'-'.$i]['horasTrabalhadas'] or '' }}</td>

							@if(empty($dados[$data[1].'-'.$data[0].'-'.$i]['horaExtra']))
								<td>00:00:00</td>
							@elseif ($dados[$data[1].'-'.$data[0].'-'.$i]['horaExtra'] < 0)
								<td>00:00:00</td>
							@else
								<td class="well">{{ $dados[$data[1].'-'.$data[0].'-'.$i]['horaExtra'] }}</td>
							@endif
						@endif
						</tr>
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
						<tr>
						@if(date('N', strtotime($data[1].'-'.$data[0].'-'.$i)) == 7)
							<td>{{ date('d/m/Y', strtotime($data[1].'-'.$data[0].'-'.$i)) }}</td>
							<td>Domingo</td>
							<td>Domingo</td>
							<td>Domingo</td>
							<td>00:00:00</td>
						@else
							<td>{{ date('d/m/Y', strtotime($data[1].'-'.$data[0].'-'.$i)) }}</td>
							<td>{{ $dados[$data[1].'-'.$data[0].'-'.$i]['entrada'] or '' }}</td>
							<td>{{ $dados[$data[1].'-'.$data[0].'-'.$i]['saida'] or '' }}</td>
							<td>{{ $dados[$data[1].'-'.$data[0].'-'.$i]['horasTrabalhadas'] or '' }}</td>

							@if(empty($dados[$data[1].'-'.$data[0].'-'.$i]['horaExtra']))
								<td>00:00:00</td>
							@elseif ($dados[$data[1].'-'.$data[0].'-'.$i]['horaExtra'] < 0)
								<td>00:00:00</td>
							@else

								<td>{{ $dados[$data[1].'-'.$data[0].'-'.$i]['horaExtra'] }}</td>

							@endif
						@endif
						</tr>
					@endfor
				</table>
			</td>
		</tr>
	</table>

		<div class="well">
			Total de Hora Extra: {{ InternoFrequencia::somaHora('01:50:00', "02:50:00") }}
		</div>

</div>

@endsection