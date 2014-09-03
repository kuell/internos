@extends('layout.report')

@section('main')
<div class="col-md-12">
	<h1>Controle de Horas Trabalhadas por Setor</h1>
	<h3>Ref: </h3>

<table class="table table-condensed">
					<tr>
						<th>Setor</th>
						<th>Horas Trabalhadas</th>
					</tr>

					@foreach ($dados as $val)
						<tr>
							<td>{{ $val->setor }}</td>
							<td>{{ $val->horas }}</td>
						</tr>
					@endforeach
					<tr>
						<th>Total de Horas Trabalhadas: </th>
						<th>{{ $dados[0]->totalhoras }} </th>
					</tr>
				</table>
</div>

@endsection