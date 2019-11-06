<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
	//
	protected $table = 'applicant';

	protected $fillable = ['users_id', 'IDtype', 'IDnumber', 'moblieNo', 'dateOfBirth'
	];

	public function users(){
		return $this->belongsTo('App\User');
	}
}
