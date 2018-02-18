<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ml_field extends Model {

	//
	public $timestamps = false;

	public function validation()
	{
		return $this->belongsTo('App\ml_field_validation');
	}



}
