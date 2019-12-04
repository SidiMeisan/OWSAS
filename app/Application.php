<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
	protected $table = 'application';

	protected $fillable = ['applicant_id','programme_id','applicationdate', 'status', 'score'];

	public function applicant(){
		return $this->belongsTo('App\Applicant');
	}

	public function applayTo(){
		return $this->belongsTo('App\Programme');
	}
}
