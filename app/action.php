<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class action extends Model
{
    //

    public function lists()
    {
    	return $this->hasMany('s_list');
    }


    public function cells()
    {
    	return $this->hasMany('cell');
    }


    public function rows()
    {
    	return $this->hasMany('row');
    }
}
