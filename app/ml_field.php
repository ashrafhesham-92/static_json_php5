<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ml_field extends Model {

	//
	public $timestamps = false;

	public function validations()
	{
		return $this->belongsToMany('App\ml_validation', 'ml_fields_validations', 'field_id', 'validation_id');
	}



}
