<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Qualification;
use App\QualificationObtained;
use App\Applicant;
use App\Subject;
use App\Result;
use App\User;

class QualificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        $Sdata = Qualification::where('qulificationName', $request->name)->count();
        
        if ($Sdata == 0) {
            # code...   
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
        }
        
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
            $Sdata = Subject::where('subjectName', $request->name)->count();
            
            if ($Sdata == 0) {
                # code...   
                $newSub =  new Subject;
                $newSub->subjectName = $request->name;
                $newSub->typeScore = "100";
                $newSub->save();
            }

            return redirect('admin/subject');
        }        

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
            return view('/applicantSys/qualification/home', ['data'=>$All]);
        }else{
            // if not. redirect to welcome page 
            return redirect('/');
        }
    }

    public function ApplicantQualificationObtain($id)
    {
        //user  level
        $level = Auth::user()->getLevel();
        //user id
        $userid = Auth::user()->getID();
        //select qualification with id
        $data = Qualification::where('id',$id)->first();
        //applicant id
        $applicantid = Applicant::where('users_id',$userid)->first();

        //reult with applicant id
        $res = Result::where('applicant_id',$applicantid->id)->get();

        //if he is An Applicant
        if ($level=="Applicant"){
            $int = (int) filter_var($data->resultCalcDescription, FILTER_SANITIZE_NUMBER_INT);
            if($res->count()>=$int){
                $resAvg = Result::where('applicant_id',$applicantid->id)
                ->orderBy('score', 'DESC')
                ->limit($int)
                ->avg('score');
                if ($resAvg>=$data->minimumScore) {
                    $Search = QualificationObtained::where('qualification_id', $id)
                        ->where('applicant_id',$applicantid->id)->first();
                    if(empty($Search)){
                        $new = new QualificationObtained;
                        $new->overallScore = $resAvg;
                        $new->applicant_id = $applicantid->id;
                        $new->qualification_id = $id;
                        $new->save();
                        return redirect('/');    
                    }else{
                        $new = QualificationObtained::where('id', $Search->id)->first();
                        $new->overallScore = $resAvg;
                        $new->save();
                        return redirect('/');
                    }
                }else{
                    return redirect('/');
                }
            }else{
                return redirect('/');
            }
        }else{
            // if not. redirect to welcome page 
            return redirect('/');
        }
    }

    public function ApplicantAllQualificationObtain()
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
            $Qua = QualificationObtained::where('applicant_id',$foundid->id)->get();
            if ($level=="Applicant") {
                return view('ApplicantSys/qualification/obtain',['Qua'=>$Qua]);
            }else{
                return view('/welcome');
            }
        }
    }


    //admin uni
    //applicant obtain
    
}
