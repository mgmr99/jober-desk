@extends('layouts.adminpanel')
@section('content')
<style>
h4 {
  text-align: center;
  padding: 4px 0;
}

table caption {
	padding: .5em 0;
}

table,table.dataTable th, table.dataTable td {
    width: 100%;
    table-layout: fixed;
    border-collapse: collapse;
    border: 3px solid purple;
    margin: 0 auto;
    font-size: 14px;

}
.p {
  text-align: center;
  padding-top: 140px;
  font-size: 14px;
}
</style>

<h4>Applicants</h4>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-bordered table-hover dt-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Job Applied</th>
                        <th>Company Name</th>
                        <th>CV</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applicants as $applicant)
                    <tr>
                    <td>{{ $applicant->id }}</td>
                    <td>{{ $applicant->name }}</td>
                    <td>
                        {{($applicant->job->title) }}
                    </td>
                    <td>
                        {{($applicant->job->company_name) }}
                    </td>
                    <td><a href="{{ asset('assets/resume/'.$applicant->resume) }}" target="_blank">View Resume</a></td>
                    @endforeach
                </tbody>
                {{-- <tbody>
                    @foreach ($applicants as $applicant)
                        <tr>
                            <td>{{ $applicant->id }}</td>
                            <td>{{ $applicant->name }}</td>
                            <td>
                                @if ($applicant->jobs->count() > 0)
                                    {{ $applicant->jobs[0]->title }}
                                @else
                                    No Job Applied
                                @endif
                            </td>
                            <td>
                                @if ($applicant->jobs->count() > 0)
                                    {{ $applicant->jobs[0]->company_name }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td><a href="{{ asset('assets/resume/'.$applicant->resume) }}">View Resume</a></td>
                        </tr>
                    @endforeach
                </tbody> --}}
            </table>
        </div>
    </div>
</div>
@endsection