<?php

namespace App\Http\Controllers;

use App\Models\MerchCategory;
use Illuminate\Http\Request;

class MerchCategoryController extends Controller
{
    public function index()
    {
        $merch_categories = MerchCategory::all();
        return view('merch_categories.index', compact('merch_categories'));
    }

    public function create()
    {
        return view('merch_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:merch_categories|max:255',
        ]);

        MerchCategory::create($request->only('name'));
        return redirect()->route('merch_categories.index')->with('success', 'Category created successfully!');
    }

    public function edit(MerchCategory $merch_category)
    {
        return view('merch_categories.edit', compact('merch_category'));
    }

    public function show($id)
{
    $merch_category = MerchCategory::with('types')->findOrFail($id); // Eager load related types
    return view('merch_categories.show', compact('merch_category'));
}


    public function update(Request $request, MerchCategory $merch_category)
    {
        $request->validate([
            'name' => 'required|max:255|unique:merch_categories,name,' . $merch_category->id,
        ]);

        $merch_category->update($request->only('name'));
        return redirect()->route('merch_categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(MerchCategory $merch_category)
    {
        $merch_category->delete();
        return redirect()->route('merch_categories.index')->with('success', 'Category deleted successfully!');
    }
}
