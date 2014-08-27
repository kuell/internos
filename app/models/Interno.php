<?php

class Interno extends Eloquent{
	protected $guarded = array();

	public function setor(){
		return $this->belongsTo('Setor', 'setor_id');
	}

}
