@extends('layout.main')

@section('main')
	<h1>Relatorio de Horas Extra por Interno</h1>

		<div class="form-group">
	      {{ Form::label('nome', 'Nome: ') }}
	      {{ Form::select('interno_id', array('0'=>'Selecione...')+Interno::all()->lists('nome', 'id'), null, array('class'=>'form-control', 'id'=>'interno_id'))  }}
	    </div>
	    <div class="form-group">
	      {{ Form::label('mes_ano', 'Mes/Ano: ') }}
	      {{ Form::text('mesano', null, array('class'=>'form-control mesAno', 'id'=>'mesano') ) }}
	    </div>

{{ link_to('#', 'Gerar', array('class'=>'btn btn-success abre')) }}

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

				open('/report/'+interno+'/'+mes+'/horasInterno', 'Horas Trabalhadas Interno', 'channelmode=yes');
				};
		})

	})
</script>

@endsection