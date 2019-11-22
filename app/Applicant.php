<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
<<<<<<< HEAD
    //
=======
	//
	protected $table = 'applicant';

	protected $fillable = ['users_id', 'IDtype', 'IDnumber', 'moblieNo', 'dateOfBirth'
	];

	public function users(){
		return $this->belongsTo('App\User');
	}
>>>>>>> Controller
}
