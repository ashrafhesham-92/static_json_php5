<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cell extends Model
{
    //
    public $timestamps = false;



    public function actions(){
    	return $this->belongsToMany('\App\action', 'cells_actions', 'cell_id',  'action_id');
    }
}
