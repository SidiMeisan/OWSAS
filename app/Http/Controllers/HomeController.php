<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userLevel = Auth::User()->getLevel();
        if($userLevel=='Admin'){
            return view('Admin/home');
        }elseif($userLevel=='AdminUni'){
            return view('Univ/home');
        }else{
            return view('Applicant/home');
        }
    }
}
