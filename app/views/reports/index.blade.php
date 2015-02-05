@extends('layout.main')

@section('main')
	<h1>Relatorios Gerenciais</h1>

	    <div class="form-group">
	      {{ Form::label('data', 'Data: ') }}
	      {{ Form::text('data', null, array('class'=>'form-control mesAno', 'id'=>'mesano') ) }}
	    </div>

{{ link_to('#', 'Relatorio de Produtividade', array('class'=>'btn btn-success produtividade')) }}
{{ link_to('#', 'Ponto Diario', array('class'=>'btn btn-success ponto')) }}

<script type="text/javascript">
	$(function(){
		$('.mesAno').mask('99-99-2099');
		$('.abre').click(function(){
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
		$('.produtividade').click(function(){
			mes = $('input[name=data]').val()

			if( $('input[name=data]').val() == ''){
				alert('O campo de referencia Mes/Ano deve ser preenchido!')
				 $('input[name=data]').focus()
				return false;
			}
			else{
				open('/report/'+mes+'/produtividade', 'Produtividade', 'channelmode=yes');
			}
		})

		$('.ponto').click(function(){
			mes = $('input[name=data]').val()

			if( $('input[name=data]').val() == ''){
				alert('O campo de referencia Mes/Ano deve ser preenchido!')
				 $('input[name=data]').focus()
				return false;
			}
			else{
				open('/report/'+mes+'/ponto', 'Produtividade', 'channelmode=yes');
			}
		})
	})
</script>

@endsection