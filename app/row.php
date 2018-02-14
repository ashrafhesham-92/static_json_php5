<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class row extends Model
{
    //
    public function cells(){
    	return $this->hasMany('App\cell');
    }


    public function actions(){
    	return $this->belongsToMany('\App\action', 'rows_actions', 'row_id', 'action_id');
    }
}
