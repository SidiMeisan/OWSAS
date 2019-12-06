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
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
            $level = Auth::user()->getLevel();
        }else{
            $level = "none";
        }

        if ($level=="AdminSys"){
            return redirect('/admin/home');
        }elseif ($level=="AdminUni") {
            return redirect('/university/home');
        }elseif ($level=="Applicant") {
            return redirect('/applicant/home');
        }else{
            return view('/welcome');
        }
    }
}
