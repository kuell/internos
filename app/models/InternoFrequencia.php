<?php

class InternoFrequencia extends Eloquent{
	protected $guarded = array();

	public function getDataAttribute(){
		$d = explode('-', $this->attributes['data']);
		return $d[2].'/'.$d[1].'/'.$d[0];
	}

	public function setDataAttribute($data){
		$d = explode('/', $data);

		return $this->attributes['data'] = $d[2].'-'.$d[1].'-'.$d[0];
	}

}
