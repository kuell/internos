{{ Form::open(array('url'=>'#', 'class'=>'form')) }}
	{{ Form::label('interno', 'Informe o Interno: ') }}
	{{ Form::select('interno_id', array('0'=>'Selecione ...')+Interno::all()->lists('nome', 'id'), null, array('class'=>'form-control')) }}
{{ Form::close() }}
