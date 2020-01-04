<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use APP\User;
use App\Programme;
use App\UniAdmin;
use App\Application;
use App\Applicant;

class ProgrammeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

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
	public function ApplicantProgrammeApplay($id)
	{
		$level= Auth::user()->getLevel();
		$UserID= Auth::user()->getID();
		$ldate = date('Y-m-d H:i:s');
		$ApplicantID = Application::where('users_id', $UserID);
		
		if ($level=="Applicant"){
			$newA = new Application;
			$newA->applicant_id = $ApplicantID;
			$newA->programme_id = $id;
			$newA->applicationdate = $ldate;
			$newA->status = "new";
			$newA->save();
		}else{
			return view('/welcome');
		}
	}

	//see all programme on university
	public function ApplicantProgramme()
	{
		$level= Auth::user()->getLevel();

		if($level == "Applicant"){
			$data = Programme::all();
	        return view('/ApplicantSys/programme/home',['datas'=> $data]);
		}else{
			return view('/welcome');
		}
	}
	//search programme
}
