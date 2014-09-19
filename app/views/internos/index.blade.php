@extends('layout.main')

@section('main')
	@include('internos.topo')
	{{ link_to_route('internos.create', 'Adicionar', null, array('class'=>'btn btn-success')) }}
	<div>
		@include('internos.lista')
	</div>
@endsection