<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class s_list extends Model
{
    //
    public $timestamps = false;

     protected $table = 'lists';
    
    public function headers(){
    	return $this->hasMany('App\header', 'list_id');
    }

    public function rows(){
    	return $this->hasMany('App\row', 'list_id');
    }


    public function actions(){
    	return $this->belongsToMany('\App\action', 'lists_actions', 'list_id', 'action_id');
    }

}
