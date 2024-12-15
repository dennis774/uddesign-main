<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    public function index()
    {
        $expense_categories = ExpenseCategory::all();
        return view('expense_categories.index', compact('expense_categories'));
    }

    public function create()
    {
        return view('expense_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:expense_categories|max:255',
        ]);

        ExpenseCategory::create($request->only('name'));
        return redirect()->route('expense_categories.index')->with('success', 'Category created successfully!');
    }

    public function edit(ExpenseCategory $expense_category)
    {
        return view('expense_categories.edit', compact('expense_category'));
    }

    public function show($id)
{
    $expense_category = ExpenseCategory::with('types')->findOrFail($id); // Eager load related types
    return view('expense_categories.show', compact('expense_category'));
}


    public function update(Request $request, ExpenseCategory $expense_category)
    {
        $request->validate([
            'name' => 'required|max:255|unique:expense_categories,name,' . $expense_category->id,
        ]);

        $expense_category->update($request->only('name'));
        return redirect()->route('expense_categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(ExpenseCategory $expense_category)
    {
        $expense_category->delete();
        return redirect()->route('expense_categories.index')->with('success', 'Category deleted successfully!');
    }
}
