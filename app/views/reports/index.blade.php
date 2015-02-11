@extends('layout.main')

@section('main')
	<h1>Relatorios Gerenciais</h1>

	    <div class="form-group">
	      {{ Form::label('data', 'Periodo: ') }}
	      <div class="col-md-12">
		   <div class="col-md-3">
		   		{{ Form::text('datai', null, array('class'=>'form-control mesAno', 'id'=>'mesano') ) }}
		   </div>
		   <div class="col-md-1">
		   	à
		   </div>
		   <div class="col-md-3">
		      {{ Form::text('dataf', null, array('class'=>'form-control mesAno', 'id'=>'mesano') ) }}
		   </div>
	      </div>

	    <div class="col-md-12 well ">
			{{ link_to('#', 'Relatorio de Produtividade', array('class'=>'btn btn-success produtividade')) }}
			{{ link_to('#', 'Horas Trabalhadas p/ Setor', array('class'=>'btn btn-success horasSetor')) }}
		</div>
	</div>

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
			mes = $('input[name=datai]').val()

			if( $('input[name=data]').val() == ''){
				alert('O campo de referencia Mes/Ano deve ser preenchido!')
				 $('input[name=data]').focus()
				return false;
			}
			else{
				open('/report/'+mes+'/produtividade', 'Produtividade', 'channelmode=yes');
			}
		})

		$('.horasSetor').click(function(){
			datai = $('input[name=datai]').val()
			dataf = $('input[name=dataf]').val()

			if( $('input[name=datai]').val() == '' && $('input[name=dataf]').val()){
				alert('O campo de referencia Mes/Ano deve ser preenchido!')
				 $('input[name=data]').focus()
				return false;
			}
			else{
				open('/report/'+datai+'/'+dataf+'/horasSetor', 'Produtividade', 'channelmode=yes');
			}
		})
	})
</script>

@endsection