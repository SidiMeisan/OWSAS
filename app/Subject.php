<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
	protected $table = 'subject';

	protected $fillable = ['subjectName', 'typeScore'];

	public function results(){
		return $this->hasMany('App\Result', 'subject_id', 'id');
	}

}
