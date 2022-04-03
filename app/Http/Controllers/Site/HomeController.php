<?php

namespace App\Http\Controllers\Site;

use App\Dashboard\Job;
use App\Dashboard\UserApplyJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Site\UserEducation;
use App\Site\UserExperience;
use App\User;

class HomeController extends Controller
{
    public function index(){
        return view('site.home');
    }
    public function profile(){
        $user = User::where('id',auth()->user()->id)->first();
        $user_experiences = UserExperience::where('user_id',$user->id)->get();
        return view('site.profile',compact('user','user_experiences'));
    }
    public function profileStore(Request $request){
        $request->validate([
            'name' =>  'required',
            'email' =>  'required',
            'mobile' =>  'required',
            'cv' =>  'required',
        ]);
        $request_data = $request->except(['_token', '_method','user_education','job_title','company_name','date_started','industry']);
        $user = User::where('id',auth()->user()->id)->first();

        $user->update($request_data);
        $user_education = UserEducation::where('user_id',$user->id)->first();
        if($user_education == null){
            $user_education = UserEducation::create([
                'user_id' => auth()->user()->id,
                'name' => $request->user_education,
            ]);

        }else{
            $user_education['name'] = $request->user_education;
            $user_education->update();
        }


        session()->flash('success', __('site._successfully'));
        return redirect()->route('site.profile');
    }
    public function userExperience(){
        $rules = request()->validate([
            'job_title' =>  'required',
            'company_name' =>  'required',
            'date_started' =>  'required',
            'industry' =>  'required',
        ]);
        $rules['user_id'] = auth()->user()->id;
        $user_experiences = UserExperience::create($rules);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('site.profile');
    }
    public function jobs(){
        $jobs_count = Job::count();

        $jobs = Job::get();

        return view('site.jobs',compact('jobs_count','jobs'));
    }
    public function jobDetails($id){

        $job = Job::where('id',$id)->first();
        return view('site.job_details',compact('job'));
    }
    public function apply(){
        $user = User::where('id',auth()->user()->id)->first();
        $user_apply = UserApplyJob::create([
            'user_id' => $user->id,
        ]);
        session()->flash('success', __('site.applied_successfully'));
        return redirect()->route('dashboard.jobs.index');
    }
}
