@extends('layout.main')

@section('main')
	@include('internos.topo')

		<div class="form-group">
	      {{ Form::label('periodo', 'Periodo: ') }}
	      {{ Form::text('datai'))  }}
	      {{ Form::text('dataf'))  }}
	    </div>

{{ link_to('#', 'Adicionar', array('class'=>'btn btn-success abre')) }}

<script type="text/javascript">
	$(function(){
		$('.mesAno').mask('99/2099');
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
	})
</script>

@endsection