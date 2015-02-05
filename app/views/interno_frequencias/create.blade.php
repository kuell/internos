<!DOCTYPE html>
<html>
<head>
  <title></title>
  {{ HTML::style('assets/css/bootstrap.css') }}
  {{ HTML::script('assets/js/jquery-1.10.2.js') }}
  {{ HTML::script('assets/js/jquery.maskedinput.js') }}
  <script type="text/javascript">

    function verifica (id) {
      entrada       = $("#entrada"+id).val()
      saida         = $("#saida"+id).val()
      justificativa = $('#justificativa'+id).val()
        if(entrada == "" && saida == "__:__"){
          $('#justificativa'+id).removeAttr('disabled').focus().val('FALTA')
          $('#entrada'+id+', #saida'+id).attr('disabled','disabled');
        }
        else if(entrada == "" || saida == "__:__"){
          alert('Campos de entrada e saida devem conter valor!')
          $('#entrada'+id).focus()
        }
        else if(entrada == "00:00" || saida == "00:00"){
          $('#justificativa'+id).removeAttr('disabled').focus().val('FALTA')
          $('#entrada'+id+', #saida'+id).attr('disabled','disabled');
        }
        else{
          $.post('/frequencia',  $('#form'+id).serializeArray() , function(data) {
             $('#info'+id).html(data);
            console.log(data)
          });
        }
    }

    function just(id){
      if($('#justificativa'+id).val() == ''){
          $('#saida'+id+', #entrada'+id).removeAttr('disabled');
          $('#entrada'+id).focus();
          $('#justificativa'+id).attr('disabled','disabled');
        }
      else{
          $.post('/frequencia',  $('#form'+id).serializeArray() , function(data) {
             $('#info'+id).html(data);
            console.log(data)
          });
        }
    }

    $(function(){
      $('.hora').mask('99:99')
    })
</script>
</head>
<body>

<div class="well">
  		<h3>Setor: {{ $setor->descricao }}</h3>
  		<h3>Mes: {{ $_GET['data'] }}</h3>
 </div>
  <fieldset>
    <table class="table table-hover col-md-9">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Entrada</th>
          <th>Saida</th>
          <th>Justificar Falta</th>
        </tr>
      </thead>
      <tbody>
        @foreach($setor->internos()->where('situacao', true)->get() as $interno)
        <tr>
        {{ Form::open(['id'=>'form'.$interno->id]) }}
        {{ Form::hidden('data', Input::get('data')) }}
        {{ Form::hidden('interno_id', $interno->id) }}
        @if(!$interno->frequencias()->where('data', Input::get('data'))->get()->count())
          <td>{{ $interno->nome }}</td>
          <td>{{ Form::text('entrada', null, ['class'=>'form-control hora', 'id'=>'entrada'.$interno->id]) }}</td>
          <td>{{ Form::text('saida', null, ['onblur'=>'verifica('.$interno->id.')', 'class'=>'form-control hora', 'id'=>'saida'.$interno->id]) }}</td>
          <td>{{ Form::text('justificativa', null, ['onblur'=>'just('.$interno->id.')', 'class'=>'form-control', 'disabled'=>'disabled', 'id'=>'justificativa'.$interno->id]) }}</td>
          <td>
            <div id="info{{ $interno->id }}"></div>
          </td>
        @else
          <td>{{ $interno->nome }}</td>
            <td>{{ Form::text('entrada', $interno->frequencias()->where('data', Input::get('data'))->get()->first()->entrada, ['class'=>'form-control hora', 'id'=>'entrada'.$interno->id]) }}</td>
            <td>{{ Form::text('saida', $interno->frequencias()->where('data', Input::get('data'))->get()->first()->saida, ['onblur'=>'verifica('.$interno->id.')', 'class'=>'form-control hora', 'id'=>'saida'.$interno->id]) }}</td>
            <td>{{ Form::text('justificativa', $interno->frequencias()->where('data', Input::get('data'))->get()->first()->justificativa, ['onblur'=>'just('.$interno->id.')', 'class'=>'form-control', 'disabled'=>'disabled', 'id'=>'justificativa'.$interno->id]) }}</td>
            <td>
              <div id="info{{ $interno->id }}"></div>
            </td>
        @endif
        {{ Form::close() }}
        </tr>
        @endforeach

      </tbody>
    </table>
</fieldset>
</body>
</html>