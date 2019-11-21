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
        $getLevel = Auth::user()->getLevel();
        if ($getLevel == "Admin") {
            return view('admin/home');
        }elseif ($getLevel == "AdminUni") {
            return view('university/home');
        }else{
            return view('applicant/home');
        }
    }
}
