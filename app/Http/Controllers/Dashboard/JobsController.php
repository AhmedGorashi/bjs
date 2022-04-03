<?php

namespace App\Http\Controllers\Dashboard;

use App\Dashboard\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class JobsController extends Controller
{

    public function index(Request $request,Job $jobs)
    {
        return view('dashboard.jobs.index',compact('jobs'));
    }

    public function jobsList(Job $jobs)
    {
        $data = Job::latest()->orderby('id');
        return Datatables::of($data)
            ->addColumn('action', function ($crew) {
                $edit = '
                    <a style="margin-bottom: 2px" href="' . route("dashboard.jobs.edit", $crew->id) . '" class="btn btn-primary btn-xs"><span class="fa fa-edit" data-toggle="tooltip" title="Edit"aria-hidden="true"></span></a><br>
                    ';
                $delete = '
                    <form action="' . route("dashboard.jobs.destroy", $crew->id) . '" method="post" style="display: inline-block">
                   '. csrf_field() .'
                   '. method_field('delete') .'
                <button type="submit" class="btn btn-xs btn-danger form-btn confirmation-callback" onclick="return confirm(\'Are you sure you want delete this ? \');" data-placement="left" title="Delete"><span class="fa fa-trash"></span></button>
                </form><!-- end of form -->';

                return $edit.$delete;

            })
            ->addColumn('created_at', function ($crew) {
                return date("Y/m/d",strtotime($crew->created_at));
            })
            ->addColumn('status', function ($crew) {
                if($crew->status == 0){
                    return 'Not Approved';
                }else {
                    return 'Approved';
                }
            })
            ->make(true);
    }

    public function create()
    {
        return view('dashboard.jobs.create');
    }


    public function store(Request $request)
    {
        $rules = request()->validate([
            'name' =>  'required',
            'job_description' =>  'required',
            'status' =>  'required',
            'salary' =>  'required',
            'location' =>  'required',
        ]);
        $Job = Job::create($rules);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.jobs.index');
    }


    public function edit($id)
    {
        $job = Job::where('id',$id)->first();
        return view('dashboard.jobs.edit',compact('job'));

    }

    public function update(Request $request, $id)
    {
        $rules = request()->validate([
            'name' =>  'required',
            'job_description' =>  'required',
            'status' =>  'required',
            'salary' =>  'required',
            'location' =>  'required',
        ]);
        $Job = Job::where('id',$id)->first();
        $Job->update($rules);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.jobs.index');
    }


    public function destroy($id)
    {
        $Job = Job::where('id',$id)->delete();
        session()->flash('error', __('site.deleted_successfully'));
        return redirect()->route('dashboard.jobs.index');
    }
}
