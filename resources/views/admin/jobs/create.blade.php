@extends('layouts.adminpanel')
@section('content')
<section class="content">
  <h4>Create Job</h4>
  {{-- title	company_name	address	salary	description	type	designation	experience	status --}}
  
      <!-- Default box -->
      <div class="container-fluid">
          <div class="card">
                        <form action="{{ route('admin.jobs.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">								
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" class="form-control" placeholder="Title">	
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="company_name">Company Name</label>
                                            <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name">	
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" id="address" class="form-control" placeholder="Address">	
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="salary">Salary</label>
                                            <input type="number" name="salary" id="salary" class="form-control" placeholder="NRS:">	
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="deadline">Deadline</label>
                                            <input type="date" name="deadline" id="deadline" class="form-control" placeholder="Deadline">	
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="type">Job Type</label>
                                            <input type="type" name="type" id="type" class="form-control" placeholder="Intern,Full Time,Part Time,Freelancer">	
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="designation">Designation</label>
                                            <input type="text" name="designation" id="designation" class="form-control" placeholder="Designation">	
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="experience">Experience</label>
                                            <input type="number" name="experience" id="experience" class="form-control" placeholder="Experience in years">	
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="image">Logo</label>
                                            <input type="file" name="image" id="image" class="form-control" placeholder="Company Logo" accept="image/*">                    	
                                        </div>
                                    </div>    
                                </div>
                            </div>							
                                    <div class="pb-5 pt-3">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                        <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                                    </div>
                        <form/>
            </div>
      </div>
      <!-- /.card -->
</section>  

@endsection