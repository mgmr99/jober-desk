@extends('layouts.adminpanel')
@section('content')
<section class="content">
    <h4>Update Job</h4>
    {{-- title	company_name	address	salary	description	type	designation	experience	status --}}
    
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">
                          <form action="{{ route('admin.jobs.update',$job->id)  }}" method="post">
                              @csrf
                              <div class="card-body">								
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="title">Title</label>
                                              <input type="text" name="title" id="title"  value="{{ $job->title }}" class="form-control" placeholder="Title">	
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="company_name">Company Name</label>
                                              <input type="text" name="company_name" id="company_name"  value="{{ $job->company_name }}" class="form-control" placeholder="Company Name">	
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="address">Address</label>
                                              <input type="text" name="address" id="address" class="form-control"  value="{{ $job->address }}" placeholder="Address">	
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="salary">Salary</label>
                                              <input type="number" name="salary" id="salary"  value="{{ $job->salary }}" class="form-control" placeholder="NRS:">	
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="description">Description</label>
                                              <input type="text" name="description" id="description"  value="{{ $job->description }}" class="form-control" placeholder="Description">	
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="type">Job Type</label>
                                              <input type="type" name="type" id="type"  value="{{ $job->type }}" class="form-control" placeholder="Intern,Full Time,Part Time,Freelancer">	
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="designation">Designation</label>
                                              <input type="text" name="designation" id="designation"  value="{{ $job->designation }}" class="form-control" placeholder="Designation">	
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="experience">Experience</label>
                                              <input type="number" name="experience" id="experience"  value="{{ $job->experience }}" class="form-control" placeholder="Experience in years">	
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="logo">Logo</label>
                                              <input type="file" name="logo" id="logo" class="form-control" value="{{ asset('assets/images/'.$job->logo) }}" accept="image/*">                    	
                                          </div>
                                      </div>    
                                  </div>
                              </div>							
                                      <div class="pb-5 pt-3">
                                          <button type="submit" class="btn btn-primary">Update</button>
                                          <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                                      </div>
                          <form/>
              </div>
        </div>
        <!-- /.card -->
  </section>  
  

@endsection