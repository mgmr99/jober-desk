@extends('layouts.adminpanel')
@section('content')
    <style>
        .border{
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>

<section class="jobs">
    <div class="container">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jobs</h1>
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                    </div>
                    @endif
                </div>
                @can('create_job')
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary">Create Job</a>
                </div>
                @endcan
            </div>
        </div>
        <div class="companies">
        @foreach ($jobs as $job)
            <div class="company-list">
                <div class="row border">
                    <div class="col-md-2 col-sm-2">
                        <div class="company-logo">
                            <img src="{{ asset('assets/images/' . $job->logo) }}" class="img-responsive" height="100px" width="100px" alt="" />
                        </div>
                    </div>  
                    <div class="col-md-10 col-sm-10">
                        <div class="company-content" >
                            <h3>{{ $job->title }}<span>---{{ $job->type }}</span></h3>
                            <div style="display: flex-end;">
                                <p><span class="company-name"> <i class="fa fa-briefcase"></i>{{ $job->company_name}} </span><span class="company-location"><i class="fa fa-map-marker"></i>{{ $job->address }} </span><span class="package"><i class="fa fa-money"></i>NRS:{{ $job->salary }}</span><span class="deadline"><i class="fa fa-deadline"></i> Deadline:{{ ($job->deadline ?  $job->deadline :'N/A') }}</span></p>
                                <p><span>  Status: {{ ($job->status == null) ? ('Unpublished') : ('Published')}}</span></p>
                            </div>
                        </div>
                        <div class="buttons" style="display: flex;">
                            <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form id="del-form" action="{{ route('admin.jobs.delete',$job->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            <a href="{{ route('admin.jobs.show', $job->id) }}" class="btn btn-sm btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        {{-- <div class="row">
            <form action="{{ route('show') }}" method="get">
            <input type="submit" href={{ route('show') }} class="btn brows-btn" value="Browse All Jobs" />
            </form>
        </div> --}}
    </div>
</section>
@endsection