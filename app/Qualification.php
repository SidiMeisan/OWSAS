<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
	//
	protected $table = 'qualification';

	protected $fillable = ['qulificationName', 'minimumScore', 'maximumScore', 'resultCalcDescription', 'gradelist'];
}
