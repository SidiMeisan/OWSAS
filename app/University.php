<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
<<<<<<< HEAD
    //
=======
	//
	protected $table = 'university';

	protected $fillable = ['UniName'];

	public function UniversityAdmin(){
		return $this->hasMany('App\UniAdmin');
	}
>>>>>>> Controller
}
