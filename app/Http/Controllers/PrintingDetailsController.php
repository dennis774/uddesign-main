<?php

namespace App\Http\Controllers;

use App\Models\PrintingDetails;
use App\Models\PrintingType;
use Illuminate\Http\Request;

class PrintingDetailsController extends Controller
{
    public function index()
    {
        // Correctly reference the relationship method name
        $printing_details = PrintingDetails::with('printingType')->get();
        return view('printing_details.index', compact('printing_details'));
    }

    public function create()
    {
        $printing_types = PrintingType::all();
        return view('printing_details.create', compact('printing_types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'printing_type_id' => 'required|exists:printing_types,id',
            'quantity' => 'required|integer|min:0',
        ]);

        PrintingDetails::create($request->all());
        return redirect()->route('printing_details.index')->with('success', 'Expense detail added successfully.');
    }

    public function edit($id)
    {
        $printing_detail = PrintingDetails::findOrFail($id);
        $printing_types = PrintingType::all();
        return view('printing_details.edit', compact('printing_detail', 'printing_types'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'printing_type_id' => 'required|exists:printing_types,id',
            'quantity' => 'required|integer|min:0',
        ]);

        $printing_detail = PrintingDetails::findOrFail($id);
        $printing_detail->update($request->all());
        return redirect()->route('printing_details.index')->with('success', 'Expense detail updated successfully.');
    }

    public function destroy($id)
    {
        $printing_detail = PrintingDetails::findOrFail($id);
        $printing_detail->delete();
        return redirect()->route('printing_details.index')->with('success', 'Expense detail deleted successfully.');
    }
}
