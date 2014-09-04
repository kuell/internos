<?php

class InternoFrequencia extends \Eloquent {
	protected $guarded = array();

	public function interno() {
		return $this->belongsTo('Interno');
	}

	public function getDataAttribute() {
		$d = explode('-', $this->attributes['data']);
		return $d[2].'/'.$d[1].'/'.$d[0];
	}

	public function setDataAttribute($data) {
		$d = explode('/', $data);

		return $this->attributes['data'] = $d[2].'-'.$d[1].'-'.$d[0];
	}

	public static function somaHora($hora1, $hora2) {
		$h1 = explode(':', $hora1);
		$h2 = explode(':', $hora2);

		$hora   = str_pad(($h1[0]+$h2[0]), 3, "0", STR_PAD_LEFT);
		$minuto = $h1[1]+$h2[1];

		if ($minuto >= 60) {
			$hora   = $hora+1;
			$minuto = $minuto-60;
		}

		return $hora.":".$minuto;

	}

}
