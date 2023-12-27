<?php

namespace App\Http\Controllers\admin;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('admin.reports.index',compact('reports'));
    }

    public function show(string $id)
    {
        $report = Report::find($id);
        return view('admin.reports.show',compact('report'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $reports = Report::where(function ($query) use ($search) {
            $query->where('problem', 'LIKE', "%{$search}%");
        })
            ->get();
        return view('admin.reports.index', compact('reports'));
    }

    public function destroy(string $id)
    {
        $report = Report::find($id);
        $report->delete();
        return redirect()->route('admin.reports.index');
    }
}
