<?php

namespace App\Http\Controllers;

use App\Models\MerchDetails;
use App\Models\MerchType;
use Illuminate\Http\Request;

class MerchDetailsController extends Controller
{
    public function index()
    {
        // Correctly reference the relationship method name
        $merch_details = MerchDetails::with('merchType')->get();
        return view('merch_details.index', compact('merch_details'));
    }

    public function create()
    {
        $merch_types = MerchType::all();
        return view('merch_details.create', compact('merch_types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'merch_type_id' => 'required|exists:merch_types,id',
            'pcs' => 'required|integer|min:0',
        ]);

        MerchDetails::create($request->all());
        return redirect()->route('merch_details.index')->with('success', 'Expense detail added successfully.');
    }

    public function edit($id)
    {
        $merch_detail = MerchDetails::findOrFail($id);
        $merch_types = MerchType::all();
        return view('merch_details.edit', compact('merch_detail', 'merch_types'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'merch_type_id' => 'required|exists:merch_types,id',
            'pcs' => 'required|integer|min:0',
        ]);

        $merch_detail = MerchDetails::findOrFail($id);
        $merch_detail->update($request->all());
        return redirect()->route('merch_details.index')->with('success', 'Expense detail updated successfully.');
    }

    public function destroy($id)
    {
        $merch_detail = MerchDetails::findOrFail($id);
        $merch_detail->delete();
        return redirect()->route('merch_details.index')->with('success', 'Expense detail deleted successfully.');
    }
}
