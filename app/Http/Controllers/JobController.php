<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Report;
use App\Models\Job_user;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserDetailValidation;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::where('status',1)->get();
        return view('jobs.show',compact('jobs'));
    }

    public function apply($id)
    {
        $user = auth()->user();
        $job = Job::find($id);
        $applicant = Applicant::where('user_id', $user->id)->where('job_id', $id)->first();

        if ($applicant)
        {
            session()->flash('applied', 'Applied');
        }

        return view('jobs.applyjob', compact('job'));
    }

    public function filldetails(string $job_id)
    {
        return view('user.applyform',compact('job_id'));
    }

    public function storedetails(string $id, UserDetailValidation $request)
    {
        $filename = null;

        // Validate the request
        if (!$request->validated()) 
        {
            flash('Error in applying');
            return view( 'user.applyform',compact('id'));
        }

        $name = $request->RS;
        $name = preg_replace('/\s+/', '', $name);
        $newResumeName = time(). $name . '.' . $request->resume->extension();

        // Store only the image name in the database
        $storedName = pathinfo($newResumeName, PATHINFO_BASENAME);

        // Move the image to the public/assets/images directory
        $path = $request->resume->move(public_path('assets/resume'), $newResumeName);


        // Create the applicant record
        $applicant = Applicant::create([
            'user_id'=> auth()->user()->id,
            'name' => $request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'contact'=>$request->contact,
            'resume'=>$storedName,
            'job_id' => $id,
        ]); 
        flash('Applied Successfully.');
        return redirect()->route('user.job.apply', compact('id'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search_job');
    
        $jobs = Job::query()->search($searchTerm)->get();

        return view('jobs.show', ['jobs' => $jobs]);
    }
        
    public function report()
    {
        return view('user.report');
    }

    public function storeReport(Request $request)
    {
        $request->validate([
            'problem' => 'required',
        ]);

        Report::create([
            'user_id' => auth()->user()->id,
            'problem' => $request->problem,
        ]);

        flash('Reported Successfully.');
        return redirect()->route('user.home');
    }
}    
    


