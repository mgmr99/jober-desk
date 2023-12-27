<?php

namespace App\Http\Controllers\admin;

use App\Models\Job;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobCreateRequest;
use Spatie\MediaLibrary\InteractsWithMedia;

class AdminJobController extends Controller implements HasMedia
{
    /**
     * Display a listing of the resource.
     */
    use InteractsWithMedia;

    public function index()
    {
        $jobs = Job::all();
        return view('admin.jobs.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required',
            'company_name' => 'required',
            'image' => 'required | image | mimes:jpeg,png,jpg,gif | max:2048',
            'address' => 'required',
            'salary' => 'required',
            'description' => 'required',
            'deadline' => 'required | date',
            'type' => 'required',
            'designation' => 'required',
            'experience' => 'required',
        ]);
        
        $name = $request->RS;
        $name = preg_replace('/\s+/', '', $name);
        $NewLogoName = time(). $name . '.' . $request->image->extension();

        // Store only the image name in the database
        $storedName = pathinfo($NewLogoName, PATHINFO_BASENAME);

        // Move the image to the public/assets/images directory
        $path = $request->image->move(public_path('assets/images'), $NewLogoName);


        
        Job::create(
        [
            'title' => $request->title,
            'company_name' => $request->company_name,
            'logo' => $storedName,
            'address' => $request->address,
            'salary' => $request->salary,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'type' => $request->type,
            'designation' => $request->designation,
            'experience' => $request->experience,
        ]);
        flash('Job created successfully');
        return redirect()->route('admin.jobs.index')->with('success','Job created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::find($id);
        return view('admin.jobs.show',compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::find($id);
        return view('admin.jobs.edit',compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $job = Job::find($id);
        $job->update($request->all());
        return redirect()->route('admin.jobs.index')->with('success','Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::find($id);
        $job->delete();
        flash('Job deleted successfully');
        return redirect()->route('admin.jobs.index')->with('success','Job deleted successfully');
    }
}
