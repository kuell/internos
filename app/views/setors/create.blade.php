@extends('layout.main')

@section('main')

  		@include('setors.topo')

	{{ Form::open(array('route' => 'setors.store', 'rule'=>'form')) }}
		@include('setors.form')
	{{ Form::close() }}

@endsection