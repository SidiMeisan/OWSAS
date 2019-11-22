<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
<<<<<<< HEAD
    //
=======
	//
	protected $table = 'programme';

	protected $fillable = ['university_id', 'programmename', 'description', 'closingdate'];

	public function Uni(){
		return $this->belongsTo('App\University');
	}
>>>>>>> Controller
}
