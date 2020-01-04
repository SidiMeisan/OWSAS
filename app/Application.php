<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
	protected $table = 'application';

	protected $fillable = ['applicant_id','programme_id','applicationdate', 'status'];

	public function applicant(){
		return $this->belongsTo('App\Applicant', 'applicant_id');
	}

	public function applayTo(){
		return $this->belongsTo('App\Programme', 'programme_id');
	}
}
