

 <!DOCTYPE html>
<html ng-app>
<head>
  <title></title>
  {{ HTML::style('assets/css/bootstrap.css') }}
  {{ HTML::script('assets/js/jquery-1.10.2.js') }}
  {{ HTML::script('assets/js/angular.min.js') }}
  {{ HTML::script('assets/js/jquery.maskedinput.js') }}
</head>
<body>

<div class="well">
  		<h3>Interno: {{ $interno->nome }}</h3>
  		<h3>Mes: {{ $data[0]."/".$data[1] }}</h3>
 </div>
  <fieldset>
    <table class="table table-hover col-md-9">
      <thead>
        <tr>
          <th>Dia</th>
          <th>Entrada</th>
          <th>Saida</th>
        </tr>
      </thead>
      <tbody>

        {{ Form::hidden('interno_id', $interno->id, array('id'=>'interno_id')) }}

      @for ($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, $data[0], $data[1]); $i++)
          @if(date('N', strtotime($data[1]."-".$data[0]."-".$i)) == 7)
            <tr class="danger">
	            <td>{{ date('d/m/Y', strtotime($data[1]."-".$data[0]."-".$i)) }}</td>
	            <td>DOMINGO</td>
	            <td>DOMINGO</td>
            </tr>
          @else
            <tr>

             <td>{{ Form::text("data$i", date('d/m/Y', strtotime($data[1]."-".$data[0]."-".$i)), array('class'=>'form-control', 'id'=>"data$i")) }}</td>

             	@if(!empty($valor[$i]['entrada']))
              		<td>{{ Form::text("entrada$i", $valor[$i]['entrada'] , array('class'=>'form-control hora', 'tabindex'=>'1', 'id'=>"entrada$i")) }}</td>
              	@else
              		<td>{{ Form::text("entrada$i", null , array('class'=>'form-control hora', 'tabindex'=>'1', 'id'=>"entrada$i")) }}</td>
              	@endif

              	@if(!empty($valor[$i]['entrada']))
              		<td>{{ Form::text("saida$i", $valor[$i]['saida'], array('class'=>'form-control hora', 'tabindex'=>'1', 'onblur'=>"add($i)", 'id'=>"saida$i")) }}</td>
              	@else
              		 <td>{{ Form::text("saida$i", null, array('class'=>'form-control hora', 'tabindex'=>'1', 'onblur'=>"add($i)", 'id'=>"saida$i")) }}</td>
              	@endif


            </tr>
          @endif
      @endfor
      </tbody>
    </table>
</fieldset>

  <script type="text/javascript">
  $(function(){
    $(".hora").mask('99:99')
  })

    function add(id){
      var date = document.getElementById('data'+id).value
      var entrada = document.getElementById('entrada'+id).value
      var saida = document.getElementById('saida'+id).value
      var interno = document.getElementById('interno_id').value

      $.post('/index.php/frequencia',
                          { data: date,
                            entrada: entrada,
                            saida: saida,
                            interno_id: interno
                          },function(data){
                              if(data){
                                alert(data)
                              }
                            })
    }
  </script>
</body>
</html>