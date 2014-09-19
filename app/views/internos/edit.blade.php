@extends('layout.main')

@section('main')

  		@include('internos.topo')

	{{ Form::model($interno, array('method' => 'PATCH',
                                                 'route' => array('internos.update', $interno->id) ,
                                                 'rule'=>'form'))
                                                 }}
		@include('internos.form')
	{{ Form::close() }}

@endsection