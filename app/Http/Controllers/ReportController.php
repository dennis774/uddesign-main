<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'print_sales' => 'required|numeric',
            'merch_sales' => 'required|numeric',
            'custom_sales' => 'required|numeric',
            'total_sales' => 'required|numeric',
            'print_expenses' => 'required|numeric',
            'merch_expenses' => 'required|numeric',
            'custom_expenses' => 'required|numeric',
            'total_expenses' => 'required|numeric',
        ]);

        Report::create($request->all());
        return redirect()->route('reports.index')->with('success', 'Report created successfully');
    }

    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }

    public function edit(Report $report)
    {
        return view('reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'print_sales' => 'required|numeric',
            'merch_sales' => 'required|numeric',
            'custom_sales' => 'required|numeric',
            'total_sales' => 'required|numeric',
            'print_expenses' => 'required|numeric',
            'merch_expenses' => 'required|numeric',
            'custom_expenses' => 'required|numeric',
            'total_expenses' => 'required|numeric',
        ]);

        $report->update($request->all());
        return redirect()->route('reports.index')->with('success', 'Report updated successfully');
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('reports.index')->with('success', 'Report deleted successfully');
    }
}
