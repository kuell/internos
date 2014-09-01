@extends('layout.main')

@section('main')

  		@include('setors.topo')

	{{ Form::model($setor, array('method' => 'PATCH',
                                                 'route' => array('setors.update', $setor->id) ,
                                                 'rule'=>'form'))
                                                 }}
		@include('setors.form')
	{{ Form::close() }}

@endsection