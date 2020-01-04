<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
	protected $table = 'result';

	protected $fillable = ['subject_id', 'applicant_id', 'score'];

	public function resultApplicant(){
		return $this->belongsTo('App\Applicant', 'applicant_id');
	}

	public function subjects(){
		return $this->belongsTo('App\Subject', 'subject_id');
	}
}
