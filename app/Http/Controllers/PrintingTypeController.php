<?php

namespace App\Http\Controllers;

use App\Models\PrintingCategory;
use App\Models\PrintingType;
use Illuminate\Http\Request;

class PrintingTypeController extends Controller
{
    public function index()
    {
        $printing_types = PrintingType::with('category')->get();
        return view('printing_types.index', compact('printing_types'));
    }

    public function create()
    {
        // Fetch Printing Categories instead of Printing Types
        $printing_categories = PrintingCategory::all();
        return view('printing_types.create', compact('printing_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'printing_category_id' => 'required|exists:printing_categories,id',
        ]);

        PrintingType::create($request->all());
        return redirect()->route('printing_types.index')->with('success', 'Item created successfully!');
    }

    public function show($id)
    {
        $printing_type = PrintingType::with('printingDetails')->findOrFail($id);
        return view('printing_types.show', compact('printing_type'));
    }

    public function edit(PrintingType $printing_type)
    {
        // Fetch Printing Categories instead of Printing Types
        $printing_categories = PrintingCategory::all();
        return view('printing_types.edit', compact('printing_type', 'printing_categories'));
    }

    public function update(Request $request, PrintingType $printing_type)
    {
        $request->validate([
            'name' => 'required|max:255',
            'printing_category_id' => 'required|exists:printing_categories,id',
        ]);

        $printing_type->update($request->all());
        return redirect()->route('printing_types.index')->with('success', 'Item updated successfully!');
    }

    public function destroy(PrintingType $printing_type)
    {
        $printing_type->delete();
        return redirect()->route('printing_types.index')->with('success', 'Item deleted successfully!');
    }
}
