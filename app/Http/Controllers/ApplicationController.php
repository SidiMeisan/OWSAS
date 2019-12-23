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

        if ($found == 0) {
            return view('ApplicantSys/Applicant/form');
        } else {
            # code...
            //if the user registered as applicant
            //the user will have to creatte appplicant data
            if ($level=="Applicant") {
                return view('ApplicantSys/home');
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

    //edit info
    //and then he can edit the data that he have

    //Application
    public function CreateApplication()
    {
    	# code...

    }

    public function ReadApplication()
    {
    	//and see all information of application that he send 
    }


    //result
    public function resultForm()
    {
        //select all qualification 
        $All = Subject::all();
        //user  level
        $level= Auth::user()->getLevel();

        //if he is An Admin for AdminSys
        if ($level=="Applicant"){
            //create the view with data array
            return view('applicant/result/form', ['data'=>$All]);
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

        $newS = new Result;
        $newS->applicant_id = $getID;
        $newS->subject_id = $request->Subject;
        $newS->score = $request->score;
        $newS->save();
        
        return redirect('/');
    }  
}
