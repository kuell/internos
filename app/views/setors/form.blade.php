
<fieldset>
    <div class="form-group col-md-9">
      {{ Form::label('descricao', 'Descrição do Setor: ') }}
      {{ Form::text('descricao', null, array('class'=>'form-control') ) }}
    </div>

    <div class="form-group col-md-9">
      {{ Form::label('encarregado', 'Encarregado ou Responsavel: ') }}
      {{ Form::text('encarregado', null, array('class'=>'form-control') ) }}
    </div>

    <div class="form-group col-md-4">
      {{ Form::label('situacao', 'Situação do setor: ') }}
      {{ Form::select('situacao', array(1=>'ativo', 0=>'inativo'), null, array('class'=>'form-control') ) }}
    </div>

<div class="col-md-9">
  <button type="submit" class="btn btn-primary">Gravar</button>
  {{ link_to_route('setors.index', 'Cancelar', null, array('class'=>'btn btn-danger')) }}

  </fieldset>
</div>