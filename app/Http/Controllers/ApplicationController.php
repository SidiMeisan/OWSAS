<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

use App\User;
use App\Result;
use App\Subject;
use App\Applicant;
use App\Application;
use App\QualificationObtained;

class ApplicationController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }


    //Aplicant

    public function Home()
    {
        # code...
        $level = Auth::user()->getLevel();
        $userid = Auth::user()->getID();
        //search applicant profile
        $found = Applicant::where('users_id','=',$userid)->count();
        $foundid = Applicant::where('users_id','=',$userid)->first();
        

        if ($found == 0) {
            //if the user registered as applicant
            //the user will have to creatte appplicant data
            return view('ApplicantSys/Applicant/form');
        } else {
            # code...

            $App = Application::where('applicant_id',$foundid->id)->get();
            $Qua = QualificationObtained::where('applicant_id',$foundid->id)->get();
            if ($level=="Applicant") {
                return view('ApplicantSys/home',['App'=>$App,'Qua'=>$Qua]);
            }else{
                return view('/welcome');
            }
        }
        
    }

    //regis applicant form
    public function ApplicantRegis()
    {
    	# code...
        $level = Auth::user()->getLevel();
        $userid = Auth::user()->getID();

    	//if the user registered as applicant
    	//the user will have to creatte appplicant data
        $found = Applicant::where('users_id','=',$userid)->first();
    	if ($level=="Applicant") {

        }else{
            return view('/welcome');
        }
    }
    
    public function ApplicantStore(Request $request)
    {
        $ID= Auth::user()->getID();

        $newA = new Applicant;
        $newA->users_id = $ID;
        $newA->IDtype = $request->IDType;
        $newA->IDnumber = $request->IDNumber;
        $newA->moblieNo = $request->MNumber;
        $newA->dateOfBirth = $request->DOB; 
        $newA->save();
        
        return redirect('/');

    }

    //result

    //result obtain
    public function GetResult()
    {
        //user  level
        $level= Auth::user()->getLevel();

        //get user id
        $userid= Auth::user()->getID();

        //applicant id
        $idApplicant = Applicant::where('users_id', $userid)
                                ->first();
        //if he is An Admin for AdminSys
        if ($level=="Applicant"){
            //create the view with data array
            $All = Result::where('applicant_id', $idApplicant->id)->get();
            return view('ApplicantSys/result/result', ['data'=>$All]);
        }else{
            // if not. redirect to welcome page 
            return redirect('/');
        }
    }
    //result form
    //form
    public function resultForm()
    {
        //user  level
        $level= Auth::user()->getLevel();

        //get user id
        $userid= Auth::user()->getID();

        //applicant id
        $idApplicant = Applicant::where('users_id', $userid)
                                ->first();
        //select all Subject 
        $All = Subject::all();
        //if he is An Applicant for ApplicantSys
        if ($level=="Applicant"){
            //create the view with data array
            return view('ApplicantSys/result/form', ['data'=>$All]);
        }else{
            // if not. redirect to welcome page 
            return redirect('/');
        }
    }

    public function ResultProg(Request $request)
    {
        $userid= Auth::user()->getID();

        $idApplicant = Applicant::where('users_id', $userid)
                                ->first();
        $getID = $idApplicant->id;
        $searchData = Result::where('applicant_id',$getID)
                        ->where('subject_id', $request->Subject)
                        ->first();
                        
        if (empty($searchData)) {
            # code...
            $newS = new Result;
            $newS->applicant_id = $getID;
            $newS->subject_id = $request->Subject;
            $newS->score = $request->score;
            $newS->save();
        } else {
            # code...
            $newS = $searchData;
            $newS->score = $request->score;
            $newS->save();
        }
        return redirect('/');
    }  
}
