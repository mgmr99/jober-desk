@extends('layouts.master')
@section('content')
    <section class="jobs">
        <div class="container">
            <div class="row heading">
                <h2>Search Job By Your Preference</h2>
            </div>
            <div class="row top-pad">
                <div class="filter">
                    <div class="col-md-2 col-sm-3">
                        <p>Search By:</p>
                    </div>
                    <div class="pull-right">
                        <ul class="filter-list">
                            <li>    
                                <form action="{{ route('user.jobs.search') }}" method="GET">
                                    <input type="text" name="search_job" class="form-control float-right" placeholder="Search jobs here" value="{{ request('search_job') }}">
                                    </form>
                            </li>
                        </ul>	
                    </div>
                </div>
            </div>
            <div class="companies">
                @foreach ($jobs as $job)
                <div class="company-list">
                    <form action="{{ route('user.jobs.show',$job->id) }}" method="post">
                        @csrf
                    <div class="row">
                        <div class="col-md-2 col-sm-2">
                            <div class="company-logo">
                                <img src="{{ asset('assets/images/' . $job->logo) }}" class="img-responsive" alt="Logo" height="100px" width="100px" />
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <div class="company-content">
                               
                                <h3>{{ $job->title }}</h3><h6>{{ $job->type }}</h6>
                                <p><span class="company-name"><i class="fa fa-briefcase"></i>{{ $job->company_name }}</span><span class="company-location"><i class="fa fa-map-marker"></i> {{ $job->address }}</span><span class="package"><i class="fa fa-money"></i>Nrs. {{ $job->salary }}</span> <span class="deadline"><i class="fa fa-deadline"></i> Deadline:{{ ($job->deadline ?  $job->deadline :'N/A') }}</span></p>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <button type="submit" class="btn view-job" name="View Job">View Details</button>
                        </div>
                    </div>
                </form>
                </div>         
                @endforeach
            </div>
            {{-- <div class="row">
                <input type="button" class="btn brows-btn" value="Browse All Jobs" />
            </div> --}}
        </div>
    </section>
@endsection