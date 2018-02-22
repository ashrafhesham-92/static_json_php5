<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {
	public $timestamps = false;


	//

	public function fields()
	{
		return $this->hasMany('App\ml_field', 'module_id');
	}

	public function lists()
	{
		return $this->hasMany('App\s_list', 'module_id');
	}

}
