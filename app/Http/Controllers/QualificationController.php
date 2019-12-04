<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Qualification;
use App\User;

class QualificationController extends Controller
{
    //

    // Qualification list
    Public function AdminQualification(){
        //select all qualification 
        $All = Qualification::all();

        //user  level
        $level= Auth::user()->getLevel();

        //if he is An Admin for AdminSys
        if ($level=="AdminSys"){
            //create the view with data array
            return view('/AdminSys/qualification/qualification', ['data'=>$All]);
        }else{
            // if not. redirect to welcome page 
            return redirect('/');
        }
    }


    // Qualification form
    public function QualificationForm(){

        //user  level
    	$level= Auth::user()->getLevel();

        //if he is An Admin for AdminSys
		if ($level=="AdminSys"){
            //create the view with data array
			return view('/AdminSys/qualificationForm');
		}else{
            // if not. redirect to welcome page 
			return view('/welcome');
		}
    }

    //store data to model
    public function QualificationStore(Request $request){

        // new class from qualification model 
    	$newQ = new Qualification;

        //insert data to class
        $newQ->qulificationName = $request->name;
        $newQ->minimumScore = $request->minscore;
        $newQ->maximumScore = $request->maxscore;
        $newQ->gradelist = $request->pscore;
        $newQ->resultCalcDescription = $request->Rule;

        //store data to model or instruct the model to create the data
        $newQ->save();

        //return to qualification page
        return redirect('admin/qualification');
    }

    

}
