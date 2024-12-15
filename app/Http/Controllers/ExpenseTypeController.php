<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    public function index()
    {
        $expense_types = ExpenseType::with('category')->get();
        return view('expense_types.index', compact('expense_types'));
    }

    public function create()
    {
        $expense_categories = ExpenseCategory::all();
        return view('expense_types.create', compact('expense_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'expense_category_id' => 'required|exists:expense_categories,id',
        ]);

        ExpenseType::create($request->all());
        return redirect()->route('expense_types.index')->with('success', 'Item created successfully!');
    }

    public function show($id)
{
    $expense_type = ExpenseType::with('expenseDetails')->findOrFail($id);

    return view('expense_types.show', compact('expense_type'));
}


    public function edit(ExpenseType $expense_type)
    {
        $expense_categories = ExpenseCategory::all();
        return view('expense_types.edit', compact('expense_type', 'expense_categories'));
    }

    public function update(Request $request, ExpenseType $expense_type)
    {
        $request->validate([
            'name' => 'required|max:255',
            'expense_category_id' => 'required|exists:expense_categories,id',
        ]);

        $expense_type->update($request->all());
        return redirect()->route('expense_types.index')->with('success', 'Item updated successfully!');
    }

    public function destroy(ExpenseType $expense_type)
    {
        $expense_type->delete();
        return redirect()->route('expense_types.index')->with('success', 'Item deleted successfully!');
    }
}
