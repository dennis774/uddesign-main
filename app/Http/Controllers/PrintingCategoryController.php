<?php


namespace App\Http\Controllers;

use App\Models\PrintingCategory;
use Illuminate\Http\Request;

class PrintingCategoryController extends Controller
{
    public function index()
    {
        $printing_categories = PrintingCategory::all();
        return view('printing_categories.index', compact('printing_categories'));
    }

    public function create()
    {
        return view('printing_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:printing_categories|max:255',
        ]);

        PrintingCategory::create($request->only('name'));
        return redirect()->route('printing_categories.index')->with('success', 'Category created successfully!');
    }

    public function edit(PrintingCategory $printing_category)
    {
        return view('printing_categories.edit', compact('printing_category'));
    }

    public function show($id)
{
    $printing_category = PrintingCategory::with('types')->findOrFail($id); // Eager load related types
    return view('printing_categories.show', compact('printing_category'));
}


    public function update(Request $request, PrintingCategory $printing_category)
    {
        $request->validate([
            'name' => 'required|max:255|unique:printing_categories,name,' . $printing_category->id,
        ]);

        $printing_category->update($request->only('name'));
        return redirect()->route('printing_categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(PrintingCategory $printing_category)
    {
        $printing_category->delete();
        return redirect()->route('printing_categories.index')->with('success', 'Category deleted successfully!');
    }
}
