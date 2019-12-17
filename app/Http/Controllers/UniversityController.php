<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\University;
use App\UniAdmin;
use App\User;

class UniversityController extends Controller
{
	//All University on the list
	public function AdminUniversity(){
        //all University
		$AllUni = University::all();

        //user  level
		$level= Auth::user()->getLevel();

        //if he is An Admin for AdminSys
		if ($level=="AdminSys"){
            //create the view with data array
			return view('/AdminSys/home', ['uni'=>$AllUni]);
		}else{
			return redirect('/');
		}
	}

    //Form for creating university
    public function AdminUniversityForm(){
        //user  level
        $level= Auth::user()->getLevel();

        //if he is An Admin for AdminSys
        if ($level=="AdminSys"){
            //create the view with data array
            return view('/AdminSys/university/form');
        }else{
            return redirect('/');
        }
    }

    //Add new University
    public function AdminAddUni(Request $request){
        //Create new university class
    	$uni = new University;
        $uni->UniName = $request->name;
        // save to database
        $uni->save();
        /// redirect to university Admin 
        return view('/AdminSys/university/adminForm',['Notice'=> 'uniAdd', 'UniId' => $uni->id]);
    }

    //Add new Admin for university
    public function AdminAddAdmin(Request $request){


        
        //create new class for new user 
        $newUser = new User;
        $newUser->username = $request->username;
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->level = "AdminUni";
        $newUser->password = Hash::make($request['password']);
        //save to database
        $newUser->save();

        //create new class for new Uniadmin 
        $newUniAdmin = new UniAdmin;
        $newUniAdmin->users_id = $newUser->id;
        $newUniAdmin->university_id =$request->uniId;
        //save to database
        $newUniAdmin->save();

        //redirect to home
        return redirect('/admin/home');
    }

    //Edit University form
    public function AdminEditUniForm($id){
        //user  level
        $level= Auth::user()->getLevel();

        //if he is An Admin for AdminSys
        if ($level=="AdminSys"){
            //create the view with data array
            $Uni = University::find($id);
            return view('/admin/form',['Notice'=>'uniEdd', 'Uni'=>$Uni]);
        }else{
            return redirect('/');
        }
    }

    //Update the University
    public function AdminUpdateUni($id, Request $request){
        

    	$Uni = University::find($id);
    	$Uni->UniName =  $request->nama;
    	$uni->save();
    	return view('/Admin/uni',['Notice'=> 'uniEdit']);
	}

	//Delete the University
	public function AdminDeleteUni($id){
		//check UniAdmin and delete the UniAdmin
		//check Programme and delete 
		//check if there are application to the programme and delete it
	}

    //applicant
    //see all university
    //search university
    //university with id
}
