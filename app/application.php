<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class application extends Model {

	//

	public $timestamps = false;

    protected $table = 'applications';

    public function modules(){
    	return $this->hasMany('\App\Module', 'application_id');
    }

}
