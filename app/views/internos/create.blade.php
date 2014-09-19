@extends('layout.main')

@section('main')

  		@include('internos.topo')

	{{ Form::open(array('route' => 'internos.store', 'rule'=>'form')) }}
		@include('internos.form')
	{{ Form::close() }}

@endsection