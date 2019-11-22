<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Programme;
use App\UniAdmin;

class ProgrammeController extends Controller
{
    // See all programm that Uni have
    public UniProgramme($id){
    	//select all program from thathave uni id
		$AllProg = Programme::where('university_id', $id)
								->get();
		// return all data
		return view('/Uni/Prog',['Prog'=> $AllProg]);
	}

	// Usertype AdminUni
	//Form to create new programme
	public UniAddProgrammeForm($id){
		$level= Auth::user()->getLevel();
		if ($level=="AdminUni"){
			return view('/Admin/Prog',['UniId'=> $id]);
		}else{
			return view('/welcome');
		}
	}
	// store the programme
	public UniAddProg($id, Request $request){
		$level= Auth::user()->getLevel();
		if ($level=="AdminUni"){
			$this->validate($request,[
    	 		'name' => 'required',
    	 		'description' => 'required',
    	 		'closingdate' => 'required'
    		]);

    		$Prog = new Programme;

	        $Prog->programmename = $request->name;
	        $Prog->description = $request->description;
	        $Prog->closingdate = $request->date;
	        $Prog->save();

	        if (!isset($request->repeat)){
	        	return view('/Admin/AddProg/{$id}',['Notice'=> 'uniAdd']);
	        }else{
				return view('/Admin/Prog',['Notice'=> 'uniAdd']);
	        }
		}else{
			return view('/welcome');
		}
	}
}
