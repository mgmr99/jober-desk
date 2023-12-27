@extends('layouts.adminpanel')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Report ID: {{ $report->id }}</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Problem</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $report->problem }}</td>
                        <td>
                            <a href="{{ route('admin.reports.delete', $report->id) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="pb-5 pt-3">
                <a href="{{ route('admin.reports') }}" class="btn btn-outline-dark ml-3">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection