<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\University;
use App\User;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
	//All University on the list
	public AdminUniversity(){

		$AllUni = University::all();
		$level= Auth::user()->getLevel();
		if ($level=="AdminSys"){
			//return view('Admin/uni')->with('uni', $AllUni);
			return view('/Admin/uni',['uni'=> $AllUni]);
		}else{
			return view('/welcome');
		}
		
	}

    //Form for creating university
    public AdminUniversityForm(){
    	return view('/Admin/form');
    }

    //Add new University
    public AdminAddUni(Request $request){
    	// $this->validate($request,[
    	// 	'nama' => 'required',
    	// 	'alamat' => 'required'
    	// ]);
 
        //Pegawai::create([
    	// 	'nama' => $request->nama,
    	// 	'alamat' => $request->alamat
    	// ]);
 
    	// return redirect('/pegawai');

    	//required
    	$this->validate($request,[
    	 	'nama' => 'required'
    	]);

    	$uni = new University;

        $uni->UniName = $request->name;
        $uni->save();

        return view('/Admin/uni',['Notice'=> 'uniAdd']);
    }

    //Edit University form
    public AdminEditUniForm($id){
    	//$pegawai = Pegawai::find($id);
   		//return view('pegawai_edit', ['pegawai' => $pegawai]);
   		$Uni = University::find($id);
   		return view('/Admin/form',['Notice'=>'uniEdd', 'Uni'=>$Uni]);
    }

    //Update the University
    public AdminUpdateUni($id, Request $request){
    	//$this->validate($request,[
	   	//	'nama' => 'required',
	   	//	'alamat' => 'required'
    	//]);
 
	    //$pegawai = Pegawai::find($id);
	    //$pegawai->nama = $request->nama;
	    //$pegawai->alamat = $request->alamat;
	    //$pegawai->save();
	    //return redirect('/pegawai');

	    $this->validate($request,[
    	 	'nama' => 'required'
    	]);

    	$Uni = University::find($id);
    	$Uni->UniName =  $request->nama;
    	$uni->save();
    	return view('/Admin/uni',['Notice'=> 'uniEdit']);
	}

	//Delete the University
	public AdminDeleteUni($id){
		//check UniAdmin and delete the UniAdmin
		//check Programme and delete 
		//check if there are application to the programme and delete it
	}

}
