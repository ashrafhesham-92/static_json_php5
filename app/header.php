<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class header extends Model
{
    //
    public $timestamps = false;


    public function cells()
	{
		return $this->hasMany('App\cell', 'header_id');
	}


}
