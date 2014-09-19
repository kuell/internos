@extends('layout.main')

@section('main')
	@include('internos.topo')

		<div class="form-group">
	      {{ Form::label('nome', 'Nome: ') }}
	      {{ Form::select('interno_id', array('0'=>'Selecione...')+Interno::all()->lists('nome', 'id'), null, array('class'=>'form-control', 'id'=>'interno_id'))  }}
	    </div>
	    <div class="form-group">
	      {{ Form::label('mes_ano', 'Mes/Ano: ') }}
	      {{ Form::text('mesano', null, array('class'=>'form-control mesAno', 'id'=>'mesano') ) }}
	    </div>

{{ link_to('#', 'Adicionar', array('class'=>'btn btn-success abre')) }}
{{ link_to('#', 'Horas Trabalhadas p/ Setor', array('class'=>'btn btn-success setorAbre')) }}

<script type="text/javascript">
	$(function(){
		$('.mesAno').mask('99-2099');
		$('.abre').click(function(){
			if($('select[name=interno_id]').val() == 0){
				alert('O campo Nome do Interno deve ser preenchido!')
				$('select[name=interno_id]').focus();
				return false;
			}
			if( $('input[name=mesano]').val() == ''){
				alert('O campo de referencia Mes/Ano deve ser preenchido!')
				 $('input[name=mesano]').focus()
				return false;
			}
			else{
				interno = $('select[name=interno_id]').val()
				mes = $('input[name=mesano]').val()

				open('/frequencia/create?interno='+interno+'&mesano='+mes, 'Frequencia', 'channelmode=yes');
				};
		})
		$('.setorAbre').click(function(){
			mes = $('input[name=mesano]').val()

			if( $('input[name=mesano]').val() == ''){
				alert('O campo de referencia Mes/Ano deve ser preenchido!')
				 $('input[name=mesano]').focus()
				return false;
			}
			else{
				open('/report/'+mes+'/horasSetor', 'Frequencia', 'channelmode=yes');
			}
		})
	})
</script>

@endsection