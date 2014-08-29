@extends('layout.main')

@section('main')
	@include('internos.topo')
	
		<div class="form-group">
	      {{ Form::label('nome', 'Nome: ') }}
	      {{ Form::select('interno_id', array('0'=>'Selecione...')+Interno::all()->lists('nome', 'id'), null, array('class'=>'form-control', 'id'=>'interno_id'))  }}
	    </div>
	    <div class="form-group">
	      {{ Form::label('mes_ano', 'Mes/Ano: ') }}
	      {{ Form::text('mesano', null, array('class'=>'form-control', 'id'=>'mesano') ) }}
	    </div>
{{ link_to('#', 'Adicionar', array('class'=>'btn btn-success',
	    			'onclick'=>'open("index.php/frequencia/create?interno="+document.getElementById("interno_id").value+"&mesano="+document.getElementById("mesano").value, "Frequencia", "channelmode=yes")')) }}

@endsection