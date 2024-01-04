@extends('layouts.adminpanel')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Applicant Details</h1>
                <hr>
                <h4>Name: {{ $applicant->name }}</h4>
                <h4>Email: {{ $applicant->email }}</h4>
                <h4>Contact: {{ $applicant->contact }}</h4>
                <h4>Address: {{ $applicant->address }}</h4>
                <a href="{{ route('admin.applicants') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="col-md-6">
                <h1>Job Applied</h1>
                <hr>
                <h4>Title: {{ $job->title }}</h4>
                <h4>Company: {{ $job->company_name }}</h4>
                <h4>Address: {{ $job->address }}</h4>
                <h4>Salary: {{ $job->salary }}</h4>
                <h4>Description: {{ $job->description }}</h4>
            </div>
</section>

@endsection
