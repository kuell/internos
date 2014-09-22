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

		$hora   = $h1[0]+$h2[0];
		$minuto = $h1[1]+$h2[1];

		if ($minuto >= 60) {
			$hora   = $hora+1;
			$minuto = $minuto-60;
		}

		return str_pad($hora, 2, "0", STR_PAD_LEFT).":".str_pad($minuto, 2, "0", STR_PAD_LEFT);

	}

	public static function calcHoraExtra($hTrab, $hPot) {

		$ht = explode(':', $hTrab);
		$hp = explode(':', $hPot);

		$h1 = ($ht[0]*60)+$ht[1];
		$h2 = ($hp[0]*60)+$hp[1];

		$min = $h1-$h2;

		if ($min < 0) {
			$hora   = '00';
			$minuto = '00';
		} else {
			if ($min > 60) {
				$hora   = '01';
				$minuto = $min-60;
			} else {
				$hora   = '00';
				$minuto = $min;
			}
		}

		return $hora.':'.$minuto;

	}

}
