@if($internos->count())
	<table class="table table-hover" id="tabela">
		<thead>
			<tr>
				<th>Cod. Interno</th>
				<th>Nome</th>
				<th>Setor</th>
				<th>Ativo</th>
				<th>Ativo</th>
			</tr>
		</thead>
		<tbody>
			@foreach($internos as $int)
				<tr>
					<td>{{{ $int->cod_interno }}}</td>
					<td>{{{ $int->nome }}}</td>
					<td>{{{ $int->setor->descricao or 'Não Associado'}}}</td>
					<td>{{{ $int->situacao == 1 ? 'ativo' : 'desligado' }}}</td>
					<td>{{ link_to_route('internos.edit', 'Editar', $int->id, array('class'=>'btn btn-primary')) }}</td>
				</tr>
			@endforeach

		</tbody>

	</table>
@endif