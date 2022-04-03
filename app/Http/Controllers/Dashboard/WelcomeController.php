<?php

namespace App\Http\Controllers\Dashboard;

use App\Dashboard\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class WelcomeController extends Controller
{
    public function index(){
        $users = User::count();
        $jobs = Job::count();
        return view('dashboard.welcome',compact('users','jobs'));
    }
}
