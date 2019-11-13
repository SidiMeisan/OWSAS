<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
    	# code...
    	$user = User::all();
    	return view('user',['user'=> $user]);
    }

    public function create()
    {
    	# code...
    }

    public function save()
    {
    	# code...
    }

    public function grade()
    {
    	# code...
    }

    public function saveMarks()
    {
    	# code...
    }
}
