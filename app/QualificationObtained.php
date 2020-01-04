<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QualificationObtained extends Model
{
	protected $table = 'qualificationobtained';

	protected $fillable = ['overallscore', 'applicant_id', 'qualification_id'];

	public function applicant(){
		return $this->belongsTo('App\Applicant');
	}
	public function qualification(){
		return $this->belongsTo('App\Qualification', 'qualification_id');
	}
	public function result(){
		return $this->belongsTo('App\Result', 'overallscore');
	}
}
