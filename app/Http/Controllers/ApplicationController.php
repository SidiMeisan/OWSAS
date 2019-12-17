<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

use App\User;
use App\Applicant;
use App\Application;

class ApplicationController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    //Aplicant
    //regis applicant form
    public function ApplicantRegis()
    {
    	# code...
        $level= Auth::user()->getLevel();
    	//if the user registered as applicant
    	//the user will have to creatte appplicant data
    	if ($level=="Applicant") {
            return redirect('/applicant/regis');
        }else{
            return view('/welcome');
        }
    }
    
    public function ApplicantStore(Request $request)
    {
        $ID= Auth::user()->getID();


        $newApp = new Applicant;
        $newApp->users_id = $ID
        $newApp->IDtype = $request->IDtype;
        $newApp->IDnumber = $request->IDnumber;
        $newApp->moblieNo = $request->moblieNo;
        $newAPP->dateOfBirth = $request->dateOfBirth; 
        $newApp->save();

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
}
