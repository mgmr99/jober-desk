@extends('layouts.adminpanel')
@section('content')
<section class="content">
    <h4>Job Detail</h4>
    {{-- title	company_name	address	salary	description	type	designation	experience	status --}}
    
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">
                          <form action="{{ route('admin.jobs.show',$job->id)  }}" method="post">
                              @csrf
                              <div class="card-body">								
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="title">Title: </label>
                                              <p>{{ $job->title }}</p>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="company_name">Company Name: </label>
                                              <p>{{ $job->company_name }}</p>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="address">Address: </label>
                                              <p>{{ $job->address }}</p>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="salary">Salary: </label>
                                              <p>{{ $job->salary }}</p>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="description">Description:</label>
                                              <p> {{ $job->description }}</p>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="type">Job Type: </label>
                                              <p>{{ $job->type }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="designation">Designation: </label>
                                                <p>{{ $job->designation }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="experience">Experience: </label>
                                                <p>{{ $job->experience }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="deadline">Deadline: </label>
                                                <p>{{ $job->deadline }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status">Status: </label>
                                                <p>{{ ($job->status == null) ? ('Unpublished') : ('Published')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-5 pt-3">
                                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-dark ml-3">Back</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </section>
@endsection
