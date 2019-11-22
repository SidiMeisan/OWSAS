<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class Qualification extends Model
{
    //
=======
class qualification extends Model
{
	//
	protected $table = 'qualification';

	protected $fillable = ['qulificatiionName', 'minimumScore', 'maximumScore', 'resultCalcDescription', 'gradelist'];
>>>>>>> Controller
}
