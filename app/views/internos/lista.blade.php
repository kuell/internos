

@if($internos->count())
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Setor</th>
				<th>Ativo</th>
			</tr>
		</thead>
		<tbody>
			@foreach($internos as $int)
				<tr>
					<td>{{{ $int->cod_interno }}}</td>
					<td>{{{ $int->nome }}}</td>
					<td>{{{ $int->setor->descricao }}}</td>
				</tr>
			@endforeach
			
		</tbody>
		
	</table>
@endif