<?php

namespace App\Http\Controllers\reviewer;

use App\Models\Job;
use App\Events\JobCreated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->get();
        return view('admin.jobs.review',compact('jobs'));
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
        //
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
        //
    }

    public function publish(string $id)
    {
        $job = Job::find($id);
        $job->status = 1;
        $job->save();

        $data = [
            'title' => $job->title,
            'description' => $job->description,
            'company_name' => $job->company_name,
            'salary' => $job->salary,
            'location' => $job->address,
            'job_type' => $job->job_type,
        ];
        event(new JobCreated($data));
        return redirect()->route('admin.review-jobs')->with('success','Job published successfully');
    }

    public function unpublish(string $id)
    {
        $job = Job::find($id);
        $job->status = null;
        $job->save();
        return redirect()->route('admin.review-jobs')->with('success','Job unpublished successfully');
    }
}
