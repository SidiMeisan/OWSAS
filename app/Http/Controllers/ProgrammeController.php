<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use APP\User;
use App\Programme;
use App\UniAdmin;

class ProgrammeController extends Controller
{
    // See all programm that Uni have
    public function UniProgramme(){
    	//select all program from thathave uni id
    	$userid = Auth::user()->id;
    	$id = UniAdmin::where('users_id', $userid)
								->first();
		$iduni = $id->university_id;
		$AllProg = Programme::where('university_id', $id->university_id)
								->get();
		// return all data
		return view('/UniversitySys/home',['Prog'=> $AllProg]);
	}

	//Usertype AdminUni
	//Form to create new programme
	public function UniAddProgrammeForm(){
		$level= Auth::user()->getLevel();
		$userid= Auth::user()->getID();

		$UniAdmin = UniAdmin::where("users_id","=", $userid)->first();

		if ($level=="AdminUni"){
			return view('/universitySys/programme/form',['UniId'=> $UniAdmin]);
		}else{
			return view('/welcome');
		}
	}
	// store the programme
	public function UniAddProg(Request $request){
		$level= Auth::user()->getLevel();
		if ($level=="AdminUni"){

    		$Prog = new Programme;

	        $Prog->programmename = $request->name;
	        $Prog->description = $request->desc;
	        $Prog->closingdate = $request->date;
	        $Prog->university_id = $request->uniId;
	        $Prog->save();

	        return redirect('university/home');

		}else{
			return view('/welcome');
		}
	}

	//edit programme
	public function UniAddProgrammeEditForm($id)
	{
		# code...
		$level= Auth::user()->getLevel();
		if ($level=="AdminUni"){
			$Prog = Programme::where("id","=", $id)->first();

	        return view('/universitySys/programme/editform',['edit'=> $Prog]);
		}else{
			return view('/welcome');
		}
	}

	//store edit
	public function UniEditProg(Request $request){

		$level= Auth::user()->getLevel();
		if ($level=="AdminUni"){

			$Prog = Programme::where("id","=", $request->IDEdit)->first();
	        $Prog->programmename = $request->name;
	        $Prog->description = $request->desc;
	        $Prog->closingdate = $request->date;
	        $Prog->save();

	        return redirect('/');

		}else{
			return view('/welcome');
		}
	}

	//application
	public function ProgApplication($id)
	{
		# code...
		
		$level= Auth::user()->getLevel();
		if ($level=="AdminUni"){
	        return redirect('/universitySys/programme/application');

		}else{
			return view('/welcome');
		}
	}
	//acccept reject



	//applicant
	//applay to programme
	//see all programme on university
	//search programme
}
