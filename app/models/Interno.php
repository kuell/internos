<?php

class Interno extends Eloquent {
	protected $guarded = array();

	public function setor() {
		return $this->belongsTo('Setor', 'setor_id');
	}

	public function frequencia() {
		return $this->hasMany('InternoFrequencia', 'interno_id');
	}

	public function getSituacaoAttribute() {
		if ($this->attributes['situacao']) {
			return 1;
		} else {
			return 0;
		}
	}

	public function setCodInternoAttribute($codInterno) {
		if ($codInterno == null) {
			return $this->attributes['cod_interno'] = 0;
		}
	}
}
