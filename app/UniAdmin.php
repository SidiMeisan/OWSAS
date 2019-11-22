<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniAdmin extends Model
{
<<<<<<< HEAD
    //
=======
	//
	protected $table = 'uniadmin';

	protected $fillable = ['users_id', 'university_id'];

	public function Uni(){
		return $this->belongsTo('App\University');
	}
	public function users(){
		return $this->belongsTo('App\User');
	}
>>>>>>> Controller
}
