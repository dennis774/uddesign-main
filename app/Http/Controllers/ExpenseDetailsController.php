<?php

namespace App\Http\Controllers;

use App\Models\ExpenseDetail;
use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpenseDetailsController extends Controller
{
    public function index()
    {
        $expense_details = ExpenseDetail::with('expenseType')->get();
        return view('expense_details.index', compact('expense_details'));
    }

    public function create()
    {
        $expense_types = ExpenseType::all();
        return view('expense_details.create', compact('expense_types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'expense_type_id' => 'required|exists:expense_types,id',
            'price' => 'required|numeric|min:0',
        ]);

        ExpenseDetail::create($request->all());
        return redirect()->route('expense_details.index')->with('success', 'Expense detail added successfully.');
    }

    public function edit($id)
    {
        $expense_detail = ExpenseDetail::findOrFail($id);
        $expense_types = ExpenseType::all();
        return view('expense_details.edit', compact('expense_detail', 'expense_types'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'expense_type_id' => 'required|exists:expense_types,id',
            'price' => 'required|numeric|min:0',
        ]);

        $expense_detail = ExpenseDetail::findOrFail($id);
        $expense_detail->update($request->all());
        return redirect()->route('expense_details.index')->with('success', 'Expense detail updated successfully.');
    }

    public function destroy($id)
    {
        $expense_detail = ExpenseDetail::findOrFail($id);
        $expense_detail->delete();
        return redirect()->route('expense_details.index')->with('success', 'Expense detail deleted successfully.');
    }
}
