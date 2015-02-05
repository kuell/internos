@extends('layout.main')

@section('main')
	@include('internos.topo')
	{{ Form::open(['name'=>'form']) }}
		<div class="form-group">
	      {{ Form::label('nome', 'Nome: ') }}
	      {{ Form::select('setor_id', array('0'=>'Selecione...')+Interno::getSetors(), null, array('class'=>'form-control', 'id'=>'interno_id'))  }}
	    </div>
	    <div class="form-group">
	      {{ Form::label('data', 'Mes/Ano: ') }}
	      {{ Form::text('data', null, array('class'=>'form-control data', 'id'=>'data') ) }}
	    </div>

	{{ link_to('#', 'Adicionar', array('class'=>'btn btn-success abre')) }}
	{{ link_to('#', 'Horas Trabalhadas p/ Setor', array('class'=>'btn btn-success setorAbre')) }}
{{ Form::close() }}

<script type="text/javascript">
	$(function(){
		$('.data').mask('99-99-2099');
		$('.abre').click(function(){
			if($('select[name=setor_id]').val() == 0){
				alert('O campo SETOR deve ser preenchido!')
				$('select[name=setor_id]').focus();
				return false;
			}
			if( $('input[name=data]').val() == ''){
				alert('O campo de referencia Mes/Ano deve ser preenchido!')
				 $('input[name=data]').focus()
				return false;
			}
			else{
				setor = $('select[name=setor_id]').val()
				mes = $('input[name=data]').val()

				open('/frequencia/create?'+$('form[name=form]').serialize(), 'Frequencia', 'channelmode=yes');
				};
		})
		$('.setorAbre').click(function(){
			mes = $('input[name=data]').val()

			if( $('input[name=data]').val() == ''){
				alert('O campo de referencia Mes/Ano deve ser preenchido!')
				 $('input[name=data]').focus()
				return false;
			}
			else{
				open('/report/'+mes+'/horasSetor', 'Frequencia', 'channelmode=yes');
			}
		})
	})
</script>

@endsection