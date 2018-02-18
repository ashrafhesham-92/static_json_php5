<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ml_field_validation extends Model {

	//
	public $timestamps = false;


	public function fields()
	{
		return $this->hasMany('App\ml_field', 'validation_id');
	}

}
