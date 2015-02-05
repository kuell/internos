
<fieldset>
    <div class="form-group">
      {{ Form::label('nome', 'Nome: ') }}
      {{ Form::text('nome', null, array('class'=>'form-control') ) }}
    </div>

    <div class="form-group">
      {{ Form::label('setor', 'Setor: ') }}
      {{ Form::select('setor_id', array(''=>'Selecione...')+Setor::all()->lists('descricao', 'id'), null, array('class'=>'form-control'))  }}
    </div>

    <div class="form-group col-md-12">
      <div class="col-md-6">
        {{ Form::label('cod_interno', 'Codigo Interno: ') }}
        {{ Form::text('cod_interno', null, array('class'=>'form-control') ) }}
      </div>
      <div class="col-md-6">
        {{ Form::label('ativo', 'Situação: ') }}
        {{ Form::select('situacao', array(true=>'ativo', false=>'desligado'), null, array('class'=>'form-control')) }}
      </div>
    </div>

<button type="submit" class="btn btn-primary">Gravar</button>
{{ link_to_route('internos.index', 'Cancelar', null, array('class'=>'btn btn-danger')) }}

</fieldset>