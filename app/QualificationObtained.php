<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QualificationObtained extends Model
{
	//
	protected $table = 'qualificationobtained';

	protected $fillable = ['overallscore', 'users_id', 'result_id', 'qualification_id'];
}
