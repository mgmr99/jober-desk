@extends('layouts.adminpanel')
@section('content')
    <h1>Review Jobs</h1>
    @foreach ($jobs as $job)
        <div class="card " style="background: #2e2a2a; color:#fff;">
            <div class="card-header">
                <h3 class="card-title">Title: {{ $job->title }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">Job Type: {{ $job->type }}</div>
                    <div class="col-md-6">Company Name: {{ $job->company_name }}</div>
                </div>
                <div class="row">
                    <div class="col-md-6">Location: {{ $job->address }}</div>
                    <div class="col-md-6">Job Salary: Nrs {{ $job->salary }}/-</div>
                </div>
                <div class="row">
                    <div class="col-md-6">Job Description: {{ $job->description }}</div>
                    <div class="col-md-6">Experience: {{ $job->experience }} years</div>
                </div>
                <div class="row">
                    {{-- <div class="col-md-6">Job Deadline: {{ $job->deadline }}</div> --}}
                    <div class="col-md-6">Job Created At: {{ $job->created_at->format('Y-m-d') }}</div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        @if ($job->status == null)              
                            <a href="{{ route('admin.review-jobs.publish', $job->id) }}" class="btn btn-success">Publish</a>
                        @else
                            <a href="{{ route('admin.review-jobs.unpublish', $job->id) }}" class="btn btn-danger">Unpublish</a>
                        @endif
                    </div>
            </div>
            <hr><hr>
        </div>
        </div>
                @endforeach
@endsection