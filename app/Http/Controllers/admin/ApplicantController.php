<?php

namespace App\Http\Controllers\admin;

use App\Models\Job;
use App\Models\User;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Report;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $valid_users = User::has('jobs')->get();
        //check the valid users exists in applicant table, if yes the pass all their details
        $applicants = Applicant::whereIn('user_id', $valid_users->pluck('id'))->get();
        //extract job details from job table
        $jobs = Job::whereIn('id', $applicants->pluck('job_id'))->get(); 

        // Combine applicant details with job details
        $applicants = $applicants->map(function ($applicant) use ($jobs) {
            $job = $jobs->where('id', $applicant->job_id)->first();
            $applicant->job = $job;
            return $applicant;
        });
        return view('admin.applicants.index',compact('applicants'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $applicants = Applicant::search($search)->get();
        return view('admin.applicants.index', compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $applicant = Applicant::find($id);
        $job = Job::find($applicant->job_id);
        return  view('admin.applicants.show',compact('applicant','job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $applicant = Applicant::find($id);
        $applicant->delete();
        return redirect()->route('admin.applicants')->withSuccess(['Applicant deleted successfully!']);        
    }
}
