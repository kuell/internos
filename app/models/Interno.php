<?php

class Interno extends Eloquent {
	protected $guarded = array();

	public function setor() {
		return $this->belongsTo('Setor', 'setor_id');
	}

	public function frequencias() {
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
		} else {
			return $this->attributes['cod_interno'] = $codInterno;
		}
	}

	public static function getSetors() {
		$internos = Interno::whereNotNull('setor_id')->where('setor_id', '>', '0')->get();

		foreach ($internos->groupBy("setor_id") as $key => $val) {

			$setors[Setor::find($key)->id] = Setor::find($key)->descricao;
		}

		return $setors;
	}
}
