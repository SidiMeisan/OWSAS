<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class qualification extends Model
{
	//
	protected $table = 'qualification';

	protected $fillable = ['qulificatiionName', 'minimumScore', 'maximumScore', 'resultCalcDescription', 'gradelist'];
}
