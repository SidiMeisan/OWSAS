<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Qualification;
use App\Subject;
use App\User;

class QualificationController extends Controller
{

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
			return view('/AdminSys/qualification/qualificationForm');
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


    //edit qualification
    public function QualificationEditForm($id){

        //get qualification
        $TheOnes = Qualification::where('id','=',$id)->count();
        
        //user  level
        $level= Auth::user()->getLevel();

        //if he is An Admin for AdminSys
        if ($level=="AdminSys"){
            //create the view with data array
            return view('/AdminSys/qualification/qualificationEditForm', ['data'=>$TheOnes]);
        }else{
            // if not. redirect to welcome page 
            return view('/welcome');
        }
    }

    public function QualificationEdit(Request $request){

        // new class from qualification model 
        $EditQ = Qualification::where("id","=", $request->IDEdit)->first();

        //insert data to class
        $EditQ->qulificationName = $request->name;
        $EditQ->minimumScore = $request->minscore;
        $EditQ->maximumScore = $request->maxscore;
        $EditQ->gradelist = $request->pscore;
        $EditQ->resultCalcDescription = $request->Rule;

        //store data to model or instruct the model to create the data
        $EditQ->save();

        //return to qualification page
        return redirect('admin/qualification');
    }

    //subject
    public function AdminSubject()
    {
        //select all qualification 
        $All = Subject::all();

        //user  level
        $level= Auth::user()->getLevel();

        //if he is An Admin for AdminSys
        if ($level=="AdminSys"){
            //create the view with data array
            return view('/AdminSys/Subject/subject', ['data'=>$All]);
        }else{
            // if not. redirect to welcome page 
            return redirect('/');
        }
    }

    //form to add new subject
    public function subjectForm()
    {
        # code...
        //user  level
        $level= Auth::user()->getLevel();

        //if he is An Admin for AdminSys
        if ($level=="AdminSys"){
            //create the view with data array
            return view('/AdminSys/Subject/Form');
        }else{
            // if not. redirect to welcome page 
            return view('/welcome');
        }
    }
    
    //add new subject
    public function subjectStore(Request $request)
        {
            $newSub =  new Subject;
            $newSub->subjectName = $request->name;
            $newSub->typeScore = $request->typeScore;
            $newSub->save();

            return redirect('admin/subject');
        }        


    //suggest qualification
    //store suggest
    

    //applicant
    public function applicantQualification()
    {
        //select all qualification 
        $All = Qualification::all();

        //user  level
        $level= Auth::user()->getLevel();

        //if he is An Admin for Applicant
        if ($level=="Applicant"){
            //create the view with data array
            return view('/AdminSys/qualification/obtain', ['data'=>$All]);
        }else{
            // if not. redirect to welcome page 
            return redirect('/');
        }
    }

    //obtain
    //check applicant status
    //check subject applicant
    //calculate qualification
        //qualification calculation rule 
            //trim string
            //create calculation model
        //calculate from appplicant subject
    //obtain or fail


    //admin uni
    //applicant obtain
    
}
