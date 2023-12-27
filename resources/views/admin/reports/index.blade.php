@extends('layouts.adminpanel')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Reports</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Report ID</th>
                        <th>Problem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                    <tr>
                        <td>{{ $report->id }}</td>
                        <td>{{ $report->problem }}</td>
                        <td>
                            <a href="{{ route('admin.reports.show', $report->id) }}" class="btn btn-sm btn-success">View</a>
                            <a href="{{ route('admin.reports.delete', $report->id) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection