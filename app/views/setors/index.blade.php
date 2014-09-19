@extends('layout.main')

@section('main')
	@include('setors.topo')
	{{ link_to_route('setors.create', 'Adicionar', null, array('class'=>'btn btn-success')) }}
	<div>
		@include('setors.lista')
	</div>
@endsection