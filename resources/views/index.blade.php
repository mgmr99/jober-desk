@extends('layouts.master')
@section('content')
    <section class="jobs">
        <div class="container">
            <div class="row heading">
                <h2>Latest Published Jobs</h2>
                <p>A better way to find jobs related to your field.</p>
            </div>
            <div class="companies">
                @foreach ($latest_jobs as $job)
                <div class="company-list">
                    <div class="row">
                        <div class="col-md-2 col-sm-2">
                            <div class="company-logo">
                                <img src="{{ asset('assets/images/' . $job->logo) }}" class="img-responsive" height="100px" width="100px" alt="" />
                            </div>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="company-content">
                                <h3>{{ $job->title }}<span class="@if ($job->type == 'Full Time')
                                    full-time
                                    @elseif ($job->type == 'Part Time')
                                    part-time
                                    @elseif ($job->type == 'Internship')
                                    internship
                                    @elseif ($job->type == 'Freelance')
                                    freelance
                                @endif">{{ $job->type }}</span></h3>
                                <p><span class="company-name"><i class="fa fa-briefcase"></i>{{ $job->company_name }}</span><span class="company-location"><i class="fa fa-map-marker"></i>{{ $job->address }}</span><span class="package"><i class="fa fa-money"></i>{{ $job->salary }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                    @if (Auth::check())
                    <a href="{{ route('user.jobs') }}"  class="btn brows-btn">Browse All Job</a>
                    @else
                    <a href="{{ route('user.login') }}"  class="btn brows-btn">Login To Apply</a>
                    @endif
            </div>
        </div>
    </section>
    <section class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
                <h2>Want More Job & Latest Job? </h2>
                <p>Subscribe to our mailing list to receive an update when new Job arrive!</p>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Type Your Email Address...">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default">subscribe!</button>
                    </span>
                </div>
                </div>
            </div>
        </div>
    </section>    
@endsection