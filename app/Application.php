<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
<<<<<<< HEAD
    //
=======
	//
	protected $table = 'application';

	protected $fillable = ['applicant_id','applicationdate', 'status', 'score'];

	public function applicant(){
		return $this->belongsTo('App\Applicant');
	}

>>>>>>> Controller
}
