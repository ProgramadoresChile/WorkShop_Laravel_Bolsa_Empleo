<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use App\TypeJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminJobController extends Controller
{
    public function createJob()
    {
        $jobTypes = TypeJob::all();
        $categories = Category::all();

        return view('admin/createJob', compact('jobTypes', 'categories'));
    }

    public function saveJob (Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required|numeric',
            'city' => 'required',
            'country' => 'required',
            'type_job_id' => 'required',
            'categories' => 'required'
        ]);

        $job = Job::create($request->all());

        $job->categories()->attach($request->get('categories'));

        return redirect()->route('myJobs');
    }

    public function myJobs()
    {
        $jobs = Job::where('user_id', Auth::user()->id)->get();

        return view('admin/jobs', compact('jobs'));
    }

    public function editJob($id)
    {
        $job = Job::find($id);
        $jobTypes = TypeJob::all();
        $categories = Category::all();

        return view('admin/editJob', compact('job', 'jobTypes', 'categories'));
    }

    public function updateJob(Request $request, $id)
    {
        $job = Job::find($id);
        $job->update($request->all());

        return redirect()->route('myJobs');
    }

    public function deleteJob($id)
    {
        $job = Job::find($id);
        $job->delete();

        return redirect()->route('myJobs');
    }
}
